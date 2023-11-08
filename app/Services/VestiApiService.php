<?php

namespace App\Services;

class VestiApiService extends BaseApiService
{
    protected $baseUrl;
    private $header;

    public function __construct()
    {
        $this->baseUrl = env('VESTI_BASE_URL');
        $this->header = ['Authorization' => 'apikey' . env('VESTI_TOKEN')];
    }

    public function sendProductsVesti(array $data, int $companyId)
    {
        $url = $this->baseUrl . "/v1/products/company/$companyId";
        return $this->sendPostRequestWithHeaders($url, $data, $this->header);
    }
}
