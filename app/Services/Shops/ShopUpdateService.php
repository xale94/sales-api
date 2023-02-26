<?php
namespace App\Services\Shops;

use App\Domain\Shop;
use App\Infraestructure\Repositories\Shop\ShopRepository;

final class ShopUpdateService extends ShopService {

    public function __construct(ShopRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * Executes update shop service.
     *
     * @param array $shop shop data to update.
     * @return bool returns if the shop was updated or not.
     */
    public function execute(array $shop): Shop
    {
        return $this->repository->update($shop['id'], $shop);
    }
}