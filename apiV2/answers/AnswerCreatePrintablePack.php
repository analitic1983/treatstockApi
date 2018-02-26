<?php

namespace treatstock\apiv2\answers;

/**
 * Class AnswerCreatePrintablePack
 *
 * @package treatstock\apiv2
 */
class AnswerCreatePrintablePack extends AnswerBase
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