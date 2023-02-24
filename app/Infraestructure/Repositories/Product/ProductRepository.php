<?php

namespace App\Infraestructure\Repositories\Product;

use App\Domain\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductRepository implements IProductRepository
{
    public function __construct()
    {
        
    }

    /**
     * Sends a query to find specific product result by id.
     *
     * @param int $id id of product.
     * @return Product product itself.
     */
    public function find(int $id): Product
    {
        return Product::find($id);
    }

    /**
     * Sends a query to find all the products.
     *
     *  @return array result of query search
     */
    public function findAll(): Collection
    {
        return Product::all();
    }

    /**
     * Sends a query to update a Product.
     * 
     *  @param int $id id of product.
     *  @param array $product object containing the new data.
     *  @return bool true if updates row, otherwise false.
     */
    public function update(int $id, array $product): bool
    {
        return $this->find($id)->update($product);
    }

    /**
     * Sends a query to delete a product.
     * 
     *  @param int $id id of product.
     *  @return bool true if deletes row, otherwise false.
     */
    public function delete(int $id): bool
    {
        return Product::find($id)->delete();
    }

    /**
     * Sends a query to create a product.
     * 
     *  @param array $data object containing the new row.
     *  @return Product inserted product.
     */
    public function create(array $data): Product{
        $product = new Product($data);
        $product->save();
        return $product;
    }
}