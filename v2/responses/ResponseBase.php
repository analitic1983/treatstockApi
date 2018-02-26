<?php

namespace treatstock\api\v2\responses;

/**
 * class ResponseBase
 *
 * @package treatstock\api\v2
 */
abstract class ResponseBase
{
    /**
     * Request has success answer
     *
     * @var bool
     */
    public $isSuccess;


    /**
     * If error, error reason
     *
     * @var string
     */
    public $reason;

    public function __construct($dataJson, $err)
    {
        $data = json_decode($dataJson, true);
        $this->isSuccess = (bool)(isset($data['success']) ? $data['success'] : false);
        if (!$this->isSuccess) {
            if ($err) {
                $jsonDecoded = json_decode($err, true);
                if ($jsonDecoded) {
                    $err = $jsonDecoded;
                }
            } else {
                if (is_array($data)) {
                    $err = $data;
                } else {
                    $err = $dataJson;
                }
            }
        }
        $this->reason = $err;
    }
}