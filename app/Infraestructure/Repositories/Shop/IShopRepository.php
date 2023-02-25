<?php

namespace App\Infraestructure\Repositories\Shop;

use App\Domain\Shop;
use Illuminate\Database\Eloquent\Collection;

interface IShopRepository 
{
    public function find(int $id): Shop;
    public function findAll(): Collection;
    public function update(int $id, array $shop): bool;
    public function delete(int $id): bool;
    public function create(array $data, array | Collection $products): Shop;
}