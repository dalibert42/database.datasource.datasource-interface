<?php

namespace Mouf\Utils\DataSource\Interfaces;


interface ParameterizableInterface
{
    /**
     * @param array $params
     */
    public function setParameters(array $params);
}