<?php

namespace App\Http\Controllers;

use App\Domain\Shop;
use App\Services\Shops\ShopCreateService;
use App\Services\Shops\ShopDeleteService;
use App\Services\Shops\ShopReadService;
use App\Services\Shops\ShopSellProductService;
use App\Services\Shops\ShopUpdateService;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    
    public function index(ShopReadService $service)
    {
        return $service->executeMultipleFind();
    }

    public function create(ShopCreateService $service, Request $request)
    {   
        $data = $request->all();
        return $service->execute($data);
    }

    public function show(ShopReadService $service, int $shopId)
    {
        return $service->executeFind($shopId);
    }

    public function update(ShopUpdateService $service, Request $request)
    {
        $data = $request->all();
        return $service->execute($data);
    }

    public function destroy(ShopDeleteService $service, int $shopId)
    {
        return $service->execute($shopId);
    }

    public function buy(ShopSellProductService $service, Request $request)
    {
        $data = $request->all();
        return $service->execute($data);
    }
}
