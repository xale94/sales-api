<?php

namespace App\Domain;

class Shop extends BaseEntity
{

    protected $table = 'shops';

    public function products()
    {
        return $this->belongsToMany(Product::class, 'shops_products', 'shop_id', 'product_id');
    }
}
