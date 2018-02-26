<?php

namespace treatstock\api\v2\responses;

class Color
{
    /**
     * Color code
     * Example: Gray
     *
     * @var string
     */
    public $code;

    /**
     * RGB color format
     * Example: 190,190,190
     *
     * @var string
     */
    public $rgb;

    /**
     * CostInfo constructor.
     *
     * @param array $data
     */
    public function __construct($data)
    {
        $this->code = (string)(isset($data['code']) ? $data['code'] : '');
        $this->rgb = (string)(isset($data['rgb']) ? $data['rgb'] : '');
    }
}