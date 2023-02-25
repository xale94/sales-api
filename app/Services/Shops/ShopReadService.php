<?php
namespace App\Services\Shops;

use App\Domain\Shop;
use App\Infraestructure\Repositories\Shop\ShopRepository;
use Illuminate\Database\Eloquent\Collection;

final class ShopReadService extends ShopService {

    public function __construct(ShopRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * Executes finding of specific shop service.
     *
     * @param int $id id of shop to find.
     * @return Shop found shop.
     */
    public function executeFind(int $id): Shop
    {
        return $this->repository->find($id);
    }

    /**
     * Executes finding of all shops service.
     *
     * @return Collection list of Shops.
     */
    public function executeMultipleFind(): Collection
    {
        return $this->repository->findAll();
    }
}