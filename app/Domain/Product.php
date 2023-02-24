<?php

namespace App\Domain;

class Product extends BaseEntity
{
    protected $table = 'products';

    public function shops()
    {
        return $this->belongsToMany(Shop::class, 'shops_products', 'product_id', 'shop_id');
    }
}
