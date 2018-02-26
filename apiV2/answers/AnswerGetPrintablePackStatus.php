<?php

namespace treatstock\apiv2\answers;


class AnswerGetPrintablePackStatus extends AnswerBase
{
    /**
     * Printable pack id
     *
     * @var int
     */
    public $id;

    /**
     * Model id
     *
     * @var int
     */
    public $model3dId;

    /**
     * Create date
     *
     * @var string
     */
    public $createdAt;


    /**
     * Model cost
     *
     * @var float
     */
    public $affiliatePrice;

    /**
     * Model cost currency
     *
     * @var string
     */
    public $affiliateCurrency;

    /**
     * Model cost info
     *
     * @var PrintablePackCost
     */
    public $calculatedMinCost;


    /**
     * If cost isn`t calculated. Contains reason.
     * Example: not_calculated_yet - Please retry api request, cost is calculating now
     * Example: client_location_not_set - Cost can`t be calculated, if client location wasn`t setted.
     * Example: printing_impossible - Printing isn`t possible. It may be expired (1 day), need to create new Printable pack.
     *
     * @var string
     */
    public $calculatedMinCostEmptyReason;

    public function __construct($dataJson, $err)
    {
        parent::__construct($dataJson, $err);
        $data = json_decode($dataJson, true);
        $this->id = (int)(isset($data['id']) ? $data['id'] : '');
        $this->model3dId = (int)(isset($data['model3d_id']) ? $data['model3d_id'] : '');
        $this->createdAt = (int)(isset($data['created_at']) ? $data['created_at'] : '');
        $this->affiliatePrice = (int)(isset($data['affiliate_price']) ? $data['affiliate_price'] : '');
        $this->affiliateCurrency = (int)(isset($data['affiliate_currency']) ? $data['affiliate_currency'] : '');

        if (isset($data['calculated_min_cost'])) {
            if (is_array($data['calculated_min_cost'])) {
                $this->calculatedMinCost = new PrintablePackCost($data['calculated_min_cost']);
            } else {
                $this->calculatedMinCostEmptyReason = $data['calculated_min_cost'];
            }
        }
    }
}