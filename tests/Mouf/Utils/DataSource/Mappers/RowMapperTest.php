<?php

namespace Mouf\Utils\DataSource\Mappers;


use Mouf\Utils\DataSource\Pickers\CallbackPicker;
use Mouf\Utils\DataSource\Pickers\RowPicker;
use Mouf\Utils\DataSource\Row;

class RowMapperTest extends \PHPUnit_Framework_TestCase
{
    public function testGetRow()
    {
        $row = new Row(
            ["foo"=>1, "bar"=> 2]
        );

        $matchers = ['key1' => new RowPicker('foo'), 'key2' => new CallbackPicker(function($row) {
            return $row['foo'] + $row['bar'];
        })];

        $rm = new RowMapper($matchers, $row);

        $r1 = $rm->getRow();
        $this->assertEquals(['key1' => 1, 'key2' => 3], $r1);

        $r2 = $rm->getRow();
        $this->assertEquals(['key1' => 1, 'key2' => 3], $r2);
    }
}
