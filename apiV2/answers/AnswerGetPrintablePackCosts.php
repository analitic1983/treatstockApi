<?php

namespace treatstock\apiv2\answers;


/**
 * Class AnswerCreatePrintablePack
 *
 * @package treatstock\apiv2
 */
class AnswerGetPrintablePackCosts extends AnswerBase
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