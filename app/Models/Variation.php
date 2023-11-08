<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    private string $sku;
    private string $size;
    private string $color;
    private int $quantity;
    private int $order;
    private string $unit_type;

    public function __construct(
        string $sku,
        string $size,
        string $color,
        int $quantity,
        int $order,
        string $unit_type
    ) {
        $this->sku = $sku;
        $this->size = $size;
        $this->color = $color;
        $this->quantity = $quantity;
        $this->order = $order;
        $this->unit_type = $unit_type;
    }

    public function getVariation(): object
    {
        return (object) [
            'sku' => $this->sku,
            'size' => $this->size,
            'color' => $this->color,
            'quantity' => $this->quantity,
            'order' => $this->order,
            'unit_type' => $this->unit_type
        ];
    }
}
