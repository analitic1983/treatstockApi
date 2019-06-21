<?php

namespace treatstock\api\v2\responses;


/**
 * class ResponseCreatePrintablePack
 *
 * @package treatstock\api\v2
 */
class ResponseGetPrintablePackCosts extends ResponseBase
{
    /**
     * Printing cost info
     *
     * @var CostInfo[]
     */
    public $costsInfo;

    public function __construct($dataJson, $err)
    {
        $data = json_decode($dataJson, true);
        if (array_key_exists('success', $data)) {
            // Failed request
            parent::__construct($dataJson, $err);
            return;
        }
        $data = json_decode($dataJson, true);
        foreach ($data as $costInfoElement) {
            $costInfo = new CostInfo($costInfoElement);
            $this->costsInfo[] = $costInfo;
        }
        $this->isSuccess = true;
    }
}