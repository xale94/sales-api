<?php
namespace App\Services\Shops;

use App\Infraestructure\Repositories\Shop\ShopRepository;

final class ShopDeleteService extends ShopService {

    public function __construct(ShopRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * Executes delete shop service.
     *
     * @param int $id shop id to delete.
     * @return bool returns if the shop was deleted or not.
     */
    public function execute(int $id): bool
    {
        return $this->repository->delete($id);
    }
}