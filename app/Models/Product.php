<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    private string $integration_id;
    private string $code;
    private string $name;
    private ?string $description;
    private ?string $composition;
    private string $brand;
    private float $price;
    private int $promotion;
    private ?array $variations;
    private bool $active;

    public function __construct(
        string $integration_id,
        string $code,
        string $name,
        ?string $description,
        ?string $composition,
        string $brand,
        float $price,
        int $promotion,
        ?array $variations,
        bool $active = true
    ) {
        $this->integration_id = $integration_id;
        $this->code = $code;
        $this->name = $name;
        $this->description = $description;
        $this->composition = $composition;
        $this->brand = $brand;
        $this->price = $price;
        $this->promotion = $promotion;
        $this->variations = $variations;
        $this->active = $active;
    }

    public function getProduct(): object
    {
        return (object) [
            'integration_id' => $this->integration_id,
            'code' => $this->code,
            'name' => $this->name,
            'description' => $this->description,
            'composition' => $this->composition,
            'brand' => $this->brand,
            'price' => $this->price,
            'promotion' => $this->promotion,
            'variations' => $this->variations,
            'active' => $this->active
        ];
    }
}
