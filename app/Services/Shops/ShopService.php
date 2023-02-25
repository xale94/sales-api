<?php
namespace App\Services\Shops;

use App\Infraestructure\Repositories\Shop\ShopRepository;

abstract class ShopService
{
    protected $repository;

    public function __construct(ShopRepository $repository)
    {
        $this->repository = $repository;
    }
}