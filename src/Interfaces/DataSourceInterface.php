<?php
/**
 * Created by PhpStorm.
 * User: dam
 * Date: 02/12/15
 * Time: 18:30
 */

namespace Mouf\Utils\DataSource\Interfaces;


interface DataSourceInterface extends ParameterizableInterface
{
    /**
     * @return array[]
     */
    public function getData();
}