<?php
/**
 * Created by PhpStorm.
 * User: dam
 * Date: 03/12/15
 * Time: 10:38
 */

namespace Mouf\Utils\DataSource\Mappers;


use Mouf\Utils\DataSource\Interfaces\DataSourceInterface;
use Mouf\Utils\DataSource\Interfaces\PickerInterface;
use Mouf\Utils\DataSource\Row;

class ArrayMapper implements DataSourceInterface
{
    /**
     * @var PickerInterface[]
     */
    private $matchers;

    /**
     * @var DataSourceInterface
     */
    private $dataSource;

    /**
     * @var array
     */
    private $data = [];

    /**
     * @var array
     */
    private $params;

    /**
     * ArrayMapper constructor.
     * @Important
     * @param array<string,PickerInterface> $matchers
     * @param DataSourceInterface $dataSource
     * @param array $params
     */
    public function __construct(array $matchers, DataSourceInterface $dataSource, array $params = array())
    {
        $this->matchers = $matchers;
        $this->dataSource = $dataSource;
        $this->params = $params;
    }

    /**
     * @return array[]
     */
    public function getData()
    {
        if (!empty($this->data)) {
            return $this->data;
        }

        foreach ($this->dataSource->getData() as $row) {
            $this->data[] = array_map(function (PickerInterface $picker) use ($row) {
                return $picker->pick(new Row($row));
            }, $this->matchers);
        }

        return $this->data;
    }

    /**
     * @param array $params
     */
    public function setParameters(array $params)
    {
        if(empty($this->params)) {
            $this->params = $params;
        }
        $this->dataSource->setParameters($this->params);
    }
}