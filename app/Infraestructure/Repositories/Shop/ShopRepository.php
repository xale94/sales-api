<?php

namespace App\Infraestructure\Repositories\Shop;

use App\Domain\Product;
use App\Domain\Shop;
use Illuminate\Database\Eloquent\Collection;

class ShopRepository implements IShopRepository
{
    public function __construct()
    {
        
    }

    /**
     * Sends a query to find specific shop result by id.
     *
     * @param int $id id of shop.
     * @return Shop shop itself.
     */
    public function find(int $id): Shop
    {
        return Shop::with(Product::getTableName())->find($id);
    }

    /**
     * Sends a query to find all the shops.
     *
     *  @return Collection result of query search
     */
    public function findAll(): Collection
    {
        return Shop::withCount(Product::getTableName())->get();
    }

    /**
     * Sends a query to update a Shop.
     * 
     *  @param int $id id of shop.
     *  @param array $shop object containing the new data.
     *  @return bool true if updates row, otherwise false.
     */
    public function update(int $id, array $data): Shop
    {
        $shop = $this->find($id);
        $result = $shop->update($data);

        $products = $data['products'];
        $productQuantities = [];
        foreach ($products as $product) {
            $productQuantities[$product['id']] = ['quantity' => $product['quantity']];
        }

        $shop->products()->sync($productQuantities);

        return $shop;
    }

    /**
     * Sends a query to delete a shop.
     * 
     *  @param int $id id of shop.
     *  @return bool true if deletes row, otherwise false.
     */
    public function delete(int $id): bool
    {
        return Shop::find($id)->delete();
    }

    /**
     * Sends a query to create a shop.
     * 
     *  @param array $data object containing the new row.
     *  @param array|Collection $products Optional. Object containing the list of products of the new shop.
     *  @return Shop inserted shop.
     */
    public function create(array $data, array | Collection $products = []): Shop{
        $shop = new Shop($data);
        $shop->save();


        $productQuantities = [];
        foreach ($products as $product) {
            $productQuantities[$product['id']] = ['quantity' => $product['quantity']];
        }

        $shop->products()->attach($productQuantities);

        return $shop;
    }
}