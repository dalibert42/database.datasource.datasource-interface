<?php

namespace Mouf\Utils\DataSource\Interfaces;


interface RowInterface extends ParameterizableInterface
{
    /**
     * @return array
     */
    public function getRow();
}