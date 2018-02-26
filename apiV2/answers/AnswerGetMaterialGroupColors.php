<?php
namespace treatstock\apiv2\answers;

class AnswerGetMaterialGroupColors extends AnswerBase
{
    /**
     * Printing cost info
     *
     * @var MaterialGroupColor[]
     */
    public $materialGroupColors = [];

    public function __construct($dataJson, $err)
    {
        $data = json_decode($dataJson, true);
        if (array_key_exists('success', $data)) {
            // Failed request
            parent::__construct($dataJson, $err);
            return;
        }
        $data = json_decode($dataJson, true);
        foreach ($data as $materialGroupColor) {
            $costInfo = new MaterialGroupColor($materialGroupColor);
            $this->materialGroupColors[] = $costInfo;
        }
        $this->isSuccess = true;
    }
}