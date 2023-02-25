<?php

namespace App\Http\Controllers;

use App\Domain\Shop;
use App\Services\Shops\ShopCreateService;
use App\Services\Shops\ShopDeleteService;
use App\Services\Shops\ShopReadService;
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shop $shop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shop $shop)
    {
        //
    }

    public function destroy(ShopDeleteService $service, int $shopId)
    {
        return $service->execute($shopId);
    }
}
