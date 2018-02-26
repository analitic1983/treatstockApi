<?php

namespace treatstock\api\v2\requests;

abstract class RequestBase
{
    /**
     * You private api key
     *
     * @var string
     */
    public $privateKey;

    /**
     * Don`t send empty params.
     *
     * @param $post
     * @return array
     */
    protected function cleanEmptyParams($post)
    {
        $returnValue = [];
        foreach ($post as $key => $value) {
            if ($value) {
                $returnValue[$key] = $value;
            }
        }
        return $returnValue;
    }

    /**
     * Form request url
     *
     * @return string
     */
    abstract public function getRequestUrl();


    /**
     * Form post params for request
     *
     * @return array
     */
    abstract public function getPostParams();

    /**
     * Get answer class. Link request with answer.
     *
     * @return string
     */
    abstract public function getAnswerClass();
}