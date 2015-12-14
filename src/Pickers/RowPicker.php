<?php

namespace Mouf\Utils\DataSource\Pickers;


use Mouf\Utils\DataSource\Interfaces\PickerInterface;
use Mouf\Utils\DataSource\Interfaces\RowInterface;

class RowPicker implements PickerInterface
{
    /**
     * @var string
     */
    private $rowBddName;

    /**
     * Matcher constructor.
     * @param string $rowBddName
     */
    public function __construct($rowBddName)
    {
        $this->rowBddName = $rowBddName;
    }

    /**
     * @param RowInterface $row
     * @return array
     */
    public function pick(RowInterface $row)
    {
        return $row->getRow() [$this->rowBddName];
    }
}