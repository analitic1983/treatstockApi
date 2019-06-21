<?php

namespace treatstock\api\v2\responses;

class PrintablePackCost
{
    /**
     * Material group code.
     * Example: PLA
     *
     * @var string
     */
    public $materialGroup;

    /**
     * Color code.
     * Example: White
     *
     * @var string
     */
    public $color;

    /**
     * Cost for printing
     *
     * @var float
     */
    public $cost;

    /**
     * PrintablePackCost constructor.
     *
     * @param array $data
     */
    public function __construct($data)
    {
        $this->materialGroup = (string)(isset($data['materialGroup']) ? $data['materialGroup'] : '');
        $this->color = (string)(isset($data['color']) ? $data['color'] : '');
        $this->cost = (float)(isset($data['cost']) ? $data['cost'] : '');
    }
}