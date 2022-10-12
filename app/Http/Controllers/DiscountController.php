<?php

namespace App\Http\Controllers;

use App\Facades\DiscountManager;
use App\Models\Order;

class DiscountController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        $discounts = [];
        foreach ($orders as $i => $order) {
            $discount[$i] = DiscountManager::calculateDiscounts($order);
        }

        return response()->json($discount);
    }
}
