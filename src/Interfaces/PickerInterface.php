<?php

namespace Mouf\Utils\DataSource\Interfaces;


use Mouf\Utils\DataSource\Interfaces\RowInterface;

interface PickerInterface
{
    /**
     * @param RowInterface $row
     */
    public function pick(RowInterface $row);
}