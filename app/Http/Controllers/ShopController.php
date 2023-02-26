<?php

namespace App\Http\Controllers;

use App\Domain\Shop;
use App\Services\Shops\ShopCreateService;
use App\Services\Shops\ShopReadService;
use App\Services\Shops\ShopUpdateService;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    
    public function index(ShopReadService $service)
    {
        return $service->executeMultipleFind();
    }

    public function create(ShopCreateService $service, array $shop)
    {
        return $service->execute($shop);
    }

    public function show(ShopReadService $service, int $shopId)
    {
        return $service->executeFind($shopId);
    }

    public function update(ShopUpdateService $service, array $shop)
    {
        return $service->execute($shop);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shop $shop)
    {
        //
    }
}
