<?php

namespace Mouf\Utils\DataSource\Mappers;


use Mouf\Utils\DataSource\DataSource;
use Mouf\Utils\DataSource\Pickers\CallbackPicker;
use Mouf\Utils\DataSource\Pickers\RowPicker;

class ArrayMapperTest extends \PHPUnit_Framework_TestCase
{
    public function testGetData()
    {
        $datasource = new DataSource([
            ["foo"=>1, "bar"=> 2]
        ]);

        $matchers = ['key1' => new RowPicker('foo'), 'key2' => new CallbackPicker(function($row) {
            return $row['foo'] + $row['bar'];
        })];

        $am = new ArrayMapper($matchers, $datasource);
        $ds2 = $am->getData();
        $this->assertEquals([['key1' => 1, 'key2' => 3]], $ds2);

        $ds3 = $am->getData();
        $this->assertEquals([['key1' => 1, 'key2' => 3]], $ds3);
    }
}
