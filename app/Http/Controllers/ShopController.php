<?php

namespace App\Http\Controllers;

use App\Domain\Shop;
use App\Services\Shops\ShopReadService;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    
    public function index(ShopReadService $service)
    {
        return $service->executeMultipleFind();
    }

    public function create(ShopReadService $service, array $shop)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shop $shop)
    {
        //
    }
}
