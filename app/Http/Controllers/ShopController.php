<?php

namespace App\Http\Controllers;

use App\Domain\Shop;
use App\Services\Shops\ShopCreateService;
use App\Services\Shops\ShopDeleteService;
use App\Services\Shops\ShopReadService;
use App\Services\Shops\ShopSellProductService;
use App\Services\Shops\ShopUpdateService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ShopController extends Controller
{
    
    public function index(ShopReadService $service)
    {
        return $service->executeMultipleFind();
    }

    public function create(ShopCreateService $service, Request $request)
    {   
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'products' => 'nullable|array|min:1',
            'products.*.id' => 'required_with:products|integer',
            'products.*.name' => 'required_with:products|string|max:255',
            'products.*.quantity' => 'required_with:products|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return response()->json(['result' => $service->execute($data), Response::HTTP_ACCEPTED]);
    }

    public function show(ShopReadService $service, Request $request)
    {
        $data = [];
        $data['shopId'] = $request->route('id');
        $validator = Validator::make($data, [
            'shopId' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return response()->json(['result' => $service->executeFind($data['shopId']), Response::HTTP_ACCEPTED]);
    }

    public function update(ShopUpdateService $service, Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'id' => 'required|integer',
            'name' => 'required|string|max:255',
            'products' => 'nullable|array|min:1',
            'products.*.id' => 'required_with:products|integer',
            'products.*.name' => 'required_with:products|string|max:255',
            'products.*.quantity' => 'required_with:products|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return response()->json(['result' => $service->execute($data), Response::HTTP_ACCEPTED]);
    }

    public function destroy(ShopDeleteService $service, Request $request)
    {
        $data = [];
        $data['shopId'] = $request->route('id');

        $validator = Validator::make($data, [
            'shopId' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return response()->json(['result' => $service->execute($data['shopId']), Response::HTTP_ACCEPTED]);
    }

    public function buy(ShopSellProductService $service, Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'shop_id' => 'required|integer',
            'product_id' => 'required|integer',
            'quantity' => 'required|integer|min:1'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return response()->json(['result' => $service->execute($data), Response::HTTP_ACCEPTED]);
    }
}
