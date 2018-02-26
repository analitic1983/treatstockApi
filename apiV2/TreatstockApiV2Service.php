<?php

namespace treatstock\apiv2;

use treatstock\apiv2\requests\RequestBase;

/**
 * Class TreatstockApiV2Controller
 *
 * @package treatstock\apiv2
 */
class TreatstockApiV2Service
{
    public $apiUrl = '';
    public $isDebug = false;

    /**
     * TreatstockApiV2Service constructor.
     *
     * @param string $sitePath
     */
    public function __construct($sitePath = 'https://api.treatstock.com')
    {
        $this->apiUrl = $sitePath . '/api/v2/';
    }

    /**
     * @param $url
     * @param $postParams
     * @param $result
     * @param $httpStatus
     * @param $err
     */
    public function debugLog($url, $postParams, $result, $httpStatus, $err)
    {
        echo "\nURL: '" . $url . "'";
        echo "\nPost params: " . json_encode($postParams);
        echo "\nAnswer: '" . $result . "'";
        echo "\nHttp code: '" . $httpStatus . "'";
        echo "\nHttp error: '" . $err . "'";
        echo "\n";
    }

    /**
     * @param RequestBase $request
     * @return mixed
     */
    public function processRequest(RequestBase $request)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        $url = $this->apiUrl . $request->getRequestUrl();
        curl_setopt($ch, CURLOPT_URL, $url);
        $postParams = $request->getPostParams();
        if ($postParams !== null) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postParams);
        }

        $result = curl_exec($ch);
        $httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $err = '';
        if ($httpStatus !== 200) {
            $err = curl_error($ch);
        }
        curl_close($ch);
        if ($this->isDebug) {
            $this->debugLog($url, $postParams, $result, $httpStatus, $err);
        }
        $answerClass = $request->getAnswerClass();
        return new $answerClass($result, $err);
    }
}