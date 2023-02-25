<?php
namespace App\Services\Shops;

use App\Domain\Shop;
use App\Infraestructure\Repositories\Shop\ShopRepository;
use Illuminate\Database\Eloquent\Collection;

final class ShopCreateService extends ShopService {

    public function __construct(ShopRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * Executes create shop service.
     *
     * @param array $shop data for the new row.
     * @return Shop created shop.
     */
    public function execute(array $data): Shop
    {
        $products = [];
        if($data['products']){
            $products = $data['products'];
        }
        return $this->repository->create($data, $products);
    }
}