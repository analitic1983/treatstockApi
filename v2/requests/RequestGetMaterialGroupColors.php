<?php

namespace treatstock\api\v2\requests;

use treatstock\api\v2\responses\ResponseGetMaterialGroupColors;

/**
 * Class RequestGetMaterialGroupColors
 *
 * @package treatstock\api\v2\requests
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
        return ResponseGetMaterialGroupColors::class;
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