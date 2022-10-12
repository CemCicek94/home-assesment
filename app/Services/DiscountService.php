<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Facade;

class DiscountService extends Facade
{
    public function calculateDiscounts(Order $order): array
    {
        $items = $order->items;
        $discounts['orderId'] = $order->id;
        $total = $order->total;
        $totalDiscount = 0;

        foreach ($items as $item) {
            $product = Product::findOrFail($item['productId']);

            // BUY 5, GET 1 DISCOUNT
            if ($product->category == 2 && $item['quantity'] == 6) {
                $discounts['discounts'][0]['discountReason'] = 'BUY_5_GET_1';
                $discounts['discounts'][0]['discountAmount'] = $product->price;
                $discounts['discounts'][0]['subtotal'] = $total - $product->price;
                $total = $discounts['discounts'][0]['subtotal'];
                $totalDiscount += $product->price;
            }
        }

        // 10 PERCENT OVER 1000 DISCOUNT
        if ($order->total >= 1000) {
            $discounts['discounts'][1]['discountReason'] = '10_PERCENT_OVER_1000';
            $discounts['discounts'][1]['discountAmount'] = $order->total * 10 / 100;
            $discounts['discounts'][1]['subtotal'] = $total - $order->total * 10 / 100;
            $total = $total - $order->total * 10 / 100;
            $totalDiscount += $order->total * 10 / 100;
        }

        $discounts['totalDiscount'] = $totalDiscount;
        $discounts['discountedTotal'] = $total;

        return $discounts;
    }
}
