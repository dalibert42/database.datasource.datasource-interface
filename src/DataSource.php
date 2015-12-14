<?php

namespace Mouf\Utils\DataSource;


use Mouf\Utils\DataSource\Interfaces\DataSourceInterface;

class DataSource implements DataSourceInterface
{
    /**
     * @var array[]
     */
    private $data;

    /**
     * Row constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return array[]
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array $params
     */
    public function setParameters(array $params)
    {
        // Do nothing here
    }
}