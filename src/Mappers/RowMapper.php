<?php
/**
 * Created by PhpStorm.
 * User: dam
 * Date: 03/12/15
 * Time: 10:38
 */

namespace Mouf\Utils\DataSource\Mappers;


use Mouf\Utils\DataSource\Interfaces\PickerInterface;
use Mouf\Utils\DataSource\Interfaces\RowInterface;

class RowMapper implements RowInterface
{
    /**
     * @var array<string,PickerInterface>
     */
    private $matchers;

    /**
     * @var RowInterface
     */
    private $row;

    /**
     * @var array
     */
    private $params;

    /**
     * @Important
     * @param array<string,PickerInterface> $matchers
     * @param RowInterface $rowSource
     * @param array $params
     */
    public function __construct(array $matchers, RowInterface $rowSource, array $params = array())
    {
        $this->matchers = $matchers;
        $this->row = $rowSource;
        $this->params = $params;
    }

    /**
     * @return array
     */
    public function getRow()
    {
        return array_map(function(PickerInterface $picker) {
            return $picker->pick($this->row);
        }, $this->matchers);
    }

    /**
     * @param array $params
     */
    public function setParameters(array $params)
    {
        $this->params = $params;
        $this->row->setParameters($this->params);
    }
}