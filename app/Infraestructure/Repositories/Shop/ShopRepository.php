<?php

namespace App\Infraestructure\Repositories\Shop;

use App\Domain\Product;
use App\Domain\Shop;
use App\Exceptions\Shop\ShopException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;

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
        try{
            $shop = Shop::with(Product::getTableName())->findOrFail($id);
            return $shop;
        } catch (ModelNotFoundException $e) {
            throw new ShopException('Shop wasn\'t found', Response::HTTP_NOT_FOUND);
        }
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
        $shop->update($data);

        $products = $data['products'];
        if($products && count($products) > 0){
            $productsData = collect($products)->mapWithKeys(function ($product) {
                return [$product['id'] => ['quantity' => $product['quantity']]];
            });
            $shop->products()->sync($productsData);
        } else {
            $shop->products()->detach();
        }

        return $shop;
    }

    /**
     * Sends a query to delete a shop.
     * 
     *  @param int $id id of shop.
     *  @return bool true if deletes row, otherwise throws exception.
     */
    public function delete(int $id): bool
    {
        try{
            return Shop::findOrFail($id)->delete();
        }catch(ModelNotFoundException $e){
            throw new ShopException('Shop wasn\'t found', Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Sends a query to create a shop.
     * 
     *  @param array $data object containing the new row.
     *  @param array|Collection $products Optional. Object containing the list of products of the new shop.
     *  @return Shop inserted shop.
     */
    public function create(array $data, array | Collection $products = []): Shop
    {
        $shop = new Shop($data);
        $shop->save();

        $productQuantities = [];
        foreach ($products as $product) {
            $productQuantities[$product['id']] = ['quantity' => $product['quantity']];
        }

        $shop->products()->attach($productQuantities);

        return $shop;
    }

    public function findSpecificProductInShop(int $productId, Shop $shop): Product
    {
        return $shop->products()->where('product_id', $productId)->first();
    }

    public function updateShopProductQuantity(Product $product, Shop $shop, int $quantity): Product
    {
        $shop->products()->updateExistingPivot($product->id, ['quantity' => $quantity]);
        return $product;
    }
}