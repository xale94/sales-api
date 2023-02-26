<?php

namespace App\Http\Controllers;

use App\Domain\Shop;
use App\Exceptions\Shop\ShopException;
use App\Services\Shops\ShopCreateService;
use App\Services\Shops\ShopDeleteService;
use App\Services\Shops\ShopReadService;
use App\Services\Shops\ShopSellProductService;
use App\Services\Shops\ShopUpdateService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ShopController extends Controller
{

    public function index(ShopReadService $service)
    {
        try {
            if(!$result = Redis::get('shops')){
                $result = $service->executeMultipleFind();
                Redis::set('shops', $result);
            }
            return response()->json(['result' => $result, 'code' => Response::HTTP_ACCEPTED]);
        } catch(ShopException $e) {
            return response()->json(['errors' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
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
        try {
            Redis::delete('shops');
            return response()->json(['result' => $service->execute($data), 'code' => Response::HTTP_ACCEPTED]);
        } catch(ShopException $e) {
            return response()->json(['errors' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
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
        try {
            if(!$result = Redis::get('shop'.$data['shopId'])){
                $result = $service->executeFind($data['shopId']);
                Redis::set('shop', $result);
            }
            return response()->json(['result' => $result, 'code' => Response::HTTP_ACCEPTED]);
        } catch(ShopException $e) {
            return response()->json(['errors' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
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
        try {
            Redis::delete('shops');
            Redis::delete('shop'.$data['id']);
            return response()->json(['result' => $service->execute($data), 'code' => Response::HTTP_ACCEPTED]);
        } catch(ShopException $e) {
            return response()->json(['errors' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
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

        try {
            Redis::delete('shops');
            Redis::delete('shop'.$data['shopId']);
            return response()->json(['result' => $service->execute($data['shopId']), 'code' => Response::HTTP_ACCEPTED]);
        } catch(ShopException $e) {
            return response()->json(['errors' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
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

        try {
            Redis::delete('shops');
            Redis::delete('shop'.$data['shop_id']);
            return response()->json(['result' => $service->execute($data), 'code' => Response::HTTP_ACCEPTED]);
        } catch(ShopException $e) {
            return response()->json(['errors' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }
}
