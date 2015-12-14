<?php

namespace Mouf\Utils\DataSource;


class RowBuilderTest extends \PHPUnit_Framework_TestCase
{
    public function testGetRow() {
        $row = new Row([
            "foo" => 42
        ]);
        $row2 = new Row([
            "bar" => 42
        ]);

        $datasource = new DataSource([
            ["foo"=>1, "bar",2]
        ]);

        $rowInline = new Row([
            "baz" => 42
        ]);

        $rowBuilder = new RowBuilder([$row, $row2], ['ds'=>$datasource], ['inlineRow'=>$rowInline]);

        $this->assertEquals(["foo"=>42, 'bar'=>42, 'ds' => [["foo"=>1, "bar",2]], 'inlineRow'=>["baz" => 42]], $rowBuilder->getRow());

    }
}
