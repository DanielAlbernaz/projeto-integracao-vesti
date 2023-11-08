<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Variation;
use App\Services\VestiApiService;
use App\Services\ErpApiService;

class ProductService
{
    protected $vestiApi;
    protected $erpApi;

    public function __construct(
        VestiApiService $vestiApiService,
        ErpApiService $erpApiService,
    )
    {
        $this->vestiApi = $vestiApiService;
        $this->erpApi = $erpApiService;
    }

    public function integrateProducts()
    {
        $companyId = 1;
        $products = $this->getDataJson('app/public/json/produtos.json');
        $variations = $this->getDataJson('app/public/json/variacoes.json');

        $product = $this->getProductsList($products, $variations);
        return $this->vestiApi->sendProductsVesti($product, $companyId);
    }

    public function getDataJson(string $path)
    {
        $pathJson = storage_path($path);

        if (file_exists($pathJson)) {
            $jsonData = file_get_contents($pathJson);
            $data = json_decode($jsonData, true);
            return $data;
        }
    }

    public function getProductsList(array $products, array $variations)
    {
        $productList = [];
        $companyId = 1;

        foreach($products as $product){
            $product['variations'] = $this->getVariationsProducts($product['referencia'], $variations);

            $productObject = new Product(
                $product['referencia'],
                $product['referencia'],
                $product['nome'],
                $product['descricao'],
                $product['composicao'],
                $product['marca'],
                (float)$product['preco'],
                $product['promocao'],
                $product['variations']
            );
            $productList[] = $productObject->getProduct();
        }

        return $productList ;
    }


    public function getVariationsProducts(int $productCode, array $variations)
    {
        $variationsList = [];

        foreach($variations as $variation){
            if ($this->parseCodeVariation($variation['variacao']) == $productCode) {

                $variationObject = new Variation(
                    $variation['variacao'],
                    $variation['tamanho'],
                    $variation['cor'],
                    $variation['quantidade'],
                    $variation['ordem'],
                    $variation['unidade']
                );
                $variationsList[] = $variationObject->getVariation();
            }
        }
        return $variationsList;
    }

    public function parseCodeVariation(string $codeVariation)
    {
        $code = explode("_", $codeVariation);
        return $code[0];
    }

    public function getProductsApiErp()
    {
        return $this->erpApi->getProducts();
    }

    public function getVariations()
    {
        return $this->erpApi->getVariations();
    }
}
