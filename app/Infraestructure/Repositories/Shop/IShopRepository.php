<?php

namespace App\Infraestructure\Repositories\Shop;

use App\Domain\Product;
use App\Domain\Shop;
use Illuminate\Database\Eloquent\Collection;

interface IShopRepository 
{
    public function find(int $id): Shop;
    public function findAll(): Collection;
    public function update(int $id, array $shop): Shop;
    public function delete(int $id): bool;
    public function create(array $data, array | Collection $products): Shop;
    public function findSpecificProductInShop(int $productId, Shop $shop): Product;
    public function updateShopProductQuantity(Product $product, Shop $shop, int $quantityInShop): Product;
}