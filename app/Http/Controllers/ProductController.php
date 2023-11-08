<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;

class ProductController extends Controller
{

    protected $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }

    public function registerProducts()
    {
        return $this->service->integrateProducts();
    }

}
