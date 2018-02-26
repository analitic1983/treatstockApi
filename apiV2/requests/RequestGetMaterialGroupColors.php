<?php

namespace treatstock\apiv2\requests;

use treatstock\apiv2\answers\AnswerGetMaterialGroupColors;


/**
 * Class RequestGetMaterialGroupColors
 *
 * @package treatstock\apiv2\requests
 */
class RequestGetMaterialGroupColors extends RequestBase
{
    /**
     * Form request url
     *
     * @return string
     */
    public function getRequestUrl()
    {
        return 'material-group-colors/?private-key=' . $this->privateKey;
    }

    /**
     * Get answer class. Link request with answer.
     *
     * @return string
     */
    public function getAnswerClass()
    {
        return AnswerGetMaterialGroupColors::class;
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