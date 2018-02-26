<?php
namespace treatstock\api\v2\responses;

class CostInfo
{
    /**
     * Printable pack id
     * Example: 30
     *
     * @var int
     */
    public $printablePackId;

    /**
     * Material group code
     * Example: Resin
     *
     * @var string
     */
    public $materialGroup;

    /**
     * Printing printer title
     * Example: US PS: Ditto-pro
     *
     * @var string
     */
    public $printer;

    /**
     * Printing color code
     * Example: White
     *
     * @var string
     */
    public $color;

    /**
     * Printing price in USD
     * Example: 2.53
     *
     * @var float
     */
    public $price;

    /**
     * Url for printing in this color
     * Example: https://www.treatstock.com/model3d/preload-printable-pack?packPublicToken=0964bab-ad2a5db-34549ae&printerMaterialGroupId=6&printerColorId=90
     *
     * @var string
     */
    public $url;

    /**
     * CostInfo constructor.
     *
     * @param array $data
     */
    public function __construct($data)
    {
        $this->printablePackId = (int)(isset($data['printablePackId']) ? $data['printablePackId'] : '');
        $this->materialGroup = (string)(isset($data['materialGroup']) ? $data['materialGroup'] : '');
        $this->printer = (string)(isset($data['printer']) ? $data['printer'] : '');
        $this->color = (string)(isset($data['color']) ? $data['color'] : '');
        $this->price = (float)(isset($data['price']) ? $data['price'] : '');
        $this->url = (string)(isset($data['url']) ? $data['url'] : '');
    }
}