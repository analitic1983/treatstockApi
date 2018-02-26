<?php

namespace treatstock\apiv2\requests;

use treatstock\apiv2\answers\AnswerCreatePrintablePack;

/**
 * Class RequestCreatePrintablePack
 *
 * @package treatstock\apiv2\requests
 */
class RequestCreatePrintablePack extends RequestBase
{
    /**
     * Model file paths. You can set one or several path on local disk.
     * You can upload
     *
     * @var array
     */
    public $filePaths = [];

    /**
     * Also you can set model file urls. Treatstock will download it, and create printable pack.
     *
     * @var array
     */
    public $fileUrls = [];


    /**
     * OPTIONAL ATTRIBUTES
     */

    /**
     * Model price.
     *
     * @var int
     */
    public $affiliatePrice = 0;

    /**
     * Model price currency. Default: USD
     *
     * @var string
     */
    public $affiliateCurrency = '';

    /**
     * Model title. Single line text. Max length 45 chars.
     * Example: Katana Mask
     *
     * @var string
     */
    public $title = '';

    /**
     * Print instructions for print service. Multiline text.
     * Example: This model should be printed horizontally.
     *
     * @var string
     */
    public $printInstructions = '';


    /**
     * Model text description, for client. Multiline text.
     * Example: The mask was designed after Katana / Tatsu Yamashiro.
     *
     * @var string
     */
    public $description = '';

    /**
     * Client ip. By client ip Treatstock detect client location for printing.
     * Example: 83.69.106.68
     *
     * @var string
     */
    public $locationIp = '';

    /**
     * Client county location. Using iso code: https://en.wikipedia.org/wiki/ISO_3166-1
     * Example: US
     *
     * @var string
     */
    public $locationCountryIso = '';


    /**
     * Model format Computer aided design (CAD), Computer-aided manufacturing (CAM). Default CAD.
     * https://en.wikipedia.org/wiki/Computer-aided_design
     * https://en.wikipedia.org/wiki/Computer-aided_manufacturing
     * Example: CAM
     *
     * @var string
     */
    public $model3dCae = '';


    /**
     * Form request url
     *
     * @return string
     */
    public function getRequestUrl()
    {
        return 'printable-packs?private-key=' . $this->privateKey;
    }

    /**
     * Get answer class. Link request with answer.
     *
     * @return string
     */
    public function getAnswerClass()
    {
        return AnswerCreatePrintablePack::class;
    }

    /**
     * Form post params for request
     *
     * @return array
     * @throws \InvalidArgumentException
     */
    public function getPostParams()
    {
        $post = [
            'affiliate_currency' => $this->affiliateCurrency,
            'affiliate_price'    => $this->affiliatePrice,
            'title'              => $this->title,
            'print_instructions' => $this->printInstructions,
            'description'        => $this->description,
            'location[ip]'       => $this->locationIp,
            'location[country]'  => $this->locationCountryIso,
            'model3d_cae'        => $this->model3dCae,
            'file-urls'          => $this->fileUrls,
        ];

        $i = 0;
        foreach ($this->filePaths as $filePath) {
            if (!file_exists($filePath)) {
                throw new \InvalidArgumentException('File not exists: ' . $filePath);
            }
            $file = curl_file_create($filePath);
            $post['files[' . $i . ']'] = $file;
            $i++;
        }
        return $this->cleanEmptyParams($post);
    }
}