<?php

namespace treatstock\api\v2\requests;

use treatstock\api\v2\responses\ResponseGetPrintablePackCosts;

/**
 * Class RequestGetPrintablePackCosts
 *
 * @package treatstock\api\v2\requests
 */
class RequestGetPrintablePackCosts extends RequestBase
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
        return 'printable-pack-costs/?printablePackId=' . $this->printablePackId . '&private-key=' . $this->privateKey;
    }

    /**
     * Get answer class. Link request with answer.
     *
     * @return string
     */
    public function getAnswerClass()
    {
        return ResponseGetPrintablePackCosts::class;
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