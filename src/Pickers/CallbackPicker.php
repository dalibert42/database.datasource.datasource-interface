<?php

namespace Mouf\Utils\DataSource\Pickers;


use Mouf\Utils\DataSource\Interfaces\PickerInterface;
use Mouf\Utils\DataSource\Interfaces\RowInterface;

class CallbackPicker implements PickerInterface
{
    /**
     * @var callable
     */
    private $callback;

    /**
     * CallbackPicker constructor.
     * @param callable $callback
     */
    public function __construct(callable $callback)
    {
        $this->callback = $callback;
    }

    /**
     * @param RowInterface $row
     */
    public function pick(RowInterface $row)
    {
        $callback = $this->callback;
        return $callback($row->getRow());
    }
}