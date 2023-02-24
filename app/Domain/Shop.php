<?php

namespace App\Domain;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $table = 'shops';

    public function products()
    {
        return $this->belongsToMany(Product::class, 'shops_products', 'shop_id', 'product_id');
    }
}
