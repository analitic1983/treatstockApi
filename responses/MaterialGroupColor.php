<?php

namespace treatstock\api\v2\responses;

class MaterialGroupColor
{
    /**
     * Material group code
     *
     * @var string
     */
    public $code;

    /**
     * Multiline text description
     *
     * @var string
     */
    public $description;

    /**
     * @var Color[]
     */
    public $colors = [];

    /**
     * CostInfo constructor.
     *
     * @param array $data
     */
    public function __construct($data)
    {
        $this->code = (string)(isset($data['code']) ? $data['code'] : '');
        $this->description = (string)(isset($data['description']) ? $data['description'] : '');
        if (array_key_exists('colors', $data)) {
            foreach ($data['colors'] as $colorInfo) {
                $color = new Color($colorInfo);
                $this->colors[] = $color;
            }
        }
    }
}