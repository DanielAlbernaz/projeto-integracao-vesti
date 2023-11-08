<?php

namespace Tests\Unit;

use App\Services\ProductService;
use Tests\TestCase;
use Mockery;

class ProdutoServiceTest extends TestCase
{
    protected $service;

    public function teste_integrate_products()
    {
        $this->service = Mockery::mock(ProductService::class)->makePartial();
        $response = $this->service->getDataJson('app/public/json/produtos.json');
    }

}
