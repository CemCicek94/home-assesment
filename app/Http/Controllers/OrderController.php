<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderDeleteRequest;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index(){
        $orders=Order::all();
        return response()->json($orders);
    }

    public function store(OrderRequest $request)
    {
        $response=[];
        foreach ($request['items'] as $item) {
            $product = Product::findOrFail($item['productId']);
            if ($item['quantity'] <= $product->stock) {
                Order::create($request->validated());
                $response = ['status' => true, 'message' => 'success'];
            } else {
                $response = ['status' => false, 'message' => 'products.stock'];
            }
        }
        return response()->json($response);
    }

    public function destroy(OrderDeleteRequest $request){
        $order=Order::find($request['orderId']);
        $order->delete();
        return response()->json(['status'=>true]);
    }
}
