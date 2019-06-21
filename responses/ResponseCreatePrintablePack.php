<?php

namespace treatstock\api\v2\responses;

/**
 * class ResponseCreatePrintablePack
 *
 * @package treatstock\api\v2
 */
class ResponseCreatePrintablePack extends ResponseBase
{
    /**
     * Printable pack id
     *
     * @var int
     */
    public $id;


    /**
     * Url for page with printing model.
     *
     * @var string
     */
    public $redir;

    public function __construct($dataJson, $err)
    {
        parent::__construct($dataJson, $err);
        $data = json_decode($dataJson, true);
        $this->id = (int)(isset($data['id']) ? $data['id'] : '');
        $this->redir = (string)(isset($data['redir']) ? $data['redir'] : '');
    }
}