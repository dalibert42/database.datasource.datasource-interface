<?php

namespace Mouf\Utils\DataSource;


use Mouf\Utils\DataSource\Interfaces\RowInterface;
use Mouf\Utils\Value\ValueUtils;

class Row implements RowInterface
{
    /**
     * @var array
     */
    private $data;

    /**
     * Row constructor.
     * @param array<string,string>|array<string,ValueInterface> $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function getRow()
    {
        return ValueUtils::val($this->data);
    }

    /**
     * @param array $params
     */
    public function setParameters(array $params)
    {
        // Do nothing here
    }
}