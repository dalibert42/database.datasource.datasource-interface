<?php
/**
 * Created by PhpStorm.
 * User: dam
 * Date: 04/12/15
 * Time: 15:19
 */

namespace Mouf\Utils\DataSource;


use Mouf\Utils\DataSource\Interfaces\DataSourceInterface;
use Mouf\Utils\DataSource\Interfaces\ParameterizableInterface;
use Mouf\Utils\DataSource\Interfaces\RowInterface;

class RowBuilder implements RowInterface
{
    /**
     * @var RowInterface[]
     */
    private $mergedRows;

    /**
     * @var array<string, DataSourceInterface>
     */
    private $datasourceAttributes;

    /**
     * @var array<string, RowInterface>
     */
    private $rowAttributes;

    /**
     * @var array
     */
    private $params;

    /**
     * RowBuilder constructor.
     * @Important
     * @param RowInterface[] $mergedRows
     * @param array<string,DataSourceInterface> $datasourceAttributes
     * @param array<string, RowInterface> $rowAttributes
     * @param array $params
     */
    public function __construct(array $mergedRows = array(), array $datasourceAttributes = array(),
                                array $rowAttributes = array(), array $params = array())
    {
        $this->mergedRows = $mergedRows;
        $this->datasourceAttributes = $datasourceAttributes;
        $this->rowAttributes = $rowAttributes;
        $this->params = $params;
    }

    /**
     * @return array
     */
    public function getRow()
    {
        $row = [];
        foreach($this->mergedRows as $mergeRow) {
            $mergeRow->setParameters($this->params);
            if($currentRow = $mergeRow->getRow()) {
                $row += $currentRow;
            }
        }

        foreach($this->datasourceAttributes as $key => $dataSourceAttribute) {
            /* @var $dataSourceAttribute DataSourceInterface */
            $dataSourceAttribute->setParameters($this->params);
            if($currentData = $dataSourceAttribute->getData()) {
                $row[$key] = $currentData;
            }
        }

        foreach($this->rowAttributes as $key => $rowAttribute) {
            /* @var $rowAttribute RowInterface */
            $rowAttribute->setParameters($this->params);
            if($currentRow = $rowAttribute->getRow()) {
                $row[$key] = $currentRow;
            }
        }

        return $row;
    }

    /**
     * @param array $params
     */
    public function setParameters(array $params)
    {
        $this->params = $params;
    }
}