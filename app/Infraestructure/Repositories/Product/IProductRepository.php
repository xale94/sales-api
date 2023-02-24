<?php

namespace App\Infraestructure\Repositories\Product;

use App\Domain\Product;
use Illuminate\Database\Eloquent\Collection;

interface IProductRepository 
{
    public function find(int $id): Product;
    public function findAll(): Collection;
    public function update(int $id, array $product): bool;
    public function delete(int $id): bool;
    public function create(array $data): Product;
}