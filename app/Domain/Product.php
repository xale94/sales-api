<?php

namespace App\Domain;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    public function shops()
    {
        return $this->belongsToMany(Shop::class, 'shops_products', 'product_id', 'shop_id');
    }
}
