<?php

namespace App\Services;

class ErpApiService extends BaseApiService
{
    protected $baseUrl;
    private $header;

    public function __construct()
    {
        $this->baseUrl = env('ERP_BASE_URL');
        $this->header = ['Authorization' => 'apikey' . env('ERP_TOKEN')];
    }

    public function getProducts()
    {
        $url = $this->baseUrl . "/product";
        return $this->sendGetRequestWithHeaders($url, $this->header);
    }

    public function getVariations()
    {
        $url = $this->baseUrl . "/variations";
        return $this->sendGetRequestWithHeaders($url, $this->header);
    }
}
