<?php

namespace treatstock\api\v2\requests;

use treatstock\api\v2\responses\ResponseGetPrintablePackStatus;


/**
 * Class RequestGetPrintablePackStatus
 *
 * @package treatstock\api\v2
 */
class RequestGetPrintablePackStatus extends RequestBase
{

    /**
     * Printable pack id
     *
     * @var int
     */
    public $printablePackId;

    /**
     * Form request url
     *
     * @return string
     */
    public function getRequestUrl()
    {
        return 'printable-packs/' . $this->printablePackId . '?private-key=' . $this->privateKey;
    }

    /**
     * Get answer class. Link request with answer.
     *
     * @return string
     */
    public function getAnswerClass()
    {
        return ResponseGetPrintablePackStatus::class;
    }

    /**
     * Form post params for request
     *
     * @return array
     * @throws \InvalidArgumentException
     */
    public function getPostParams()
    {
        return null;
    }
}