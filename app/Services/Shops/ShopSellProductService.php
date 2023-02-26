<?php
namespace App\Services\Shops;

use App\Exceptions\Shop\ShopException;
use App\Infraestructure\Repositories\Product\ProductRepository;
use App\Infraestructure\Repositories\Shop\ShopRepository;

final class ShopSellProductService extends ShopService {

    const MIN_QUANTITY = 5;

    public function __construct(ShopRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * Executes buy of product.
     *
     * @param array $data details of the product to buy.
     * @return array returns if the product was bought or not, and a message.
     */
    public function execute(array $data): array
    {
        $shop = $this->repository->find($data['shop_id']);
        $product = $this->repository->findSpecificProductInShop($data['product_id'], $shop);
        $quantityInShop = $product->pivot->quantity;

        $flagCanBuy = false;
        $messageBuy = 'You can\'t buy the product. Quantity is bigger than stock';

        if($quantityInShop >= $data['quantity']){
            $flagCanBuy = true;
            $messageBuy = 'You can buy the product.';
        }

        if($flagCanBuy){
            $quantity = $quantityInShop - $data['quantity'];
            $product = $this->repository->updateShopProductQuantity($product, $shop, $quantity);
        } else {
            throw new ShopException($messageBuy);
        }

        if($quantity < self::MIN_QUANTITY){
            $messageBuy = 'You can buy the product. Stock is almost empty!';  
        }

        return ["status" => $flagCanBuy, "message" => $messageBuy];
    }
}