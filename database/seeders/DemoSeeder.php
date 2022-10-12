<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers= [
            [
                "id" => 1,
                "name" => "Türker Jöntürk",
                "since" => "2014-06-28",
                "revenue" => "492.12"
            ],
            [
                "id" => 2,
                "name" => "Kaptan Devopuz",
                "since" => "2015-01-15",
                "revenue" => "1505.95"
            ],
            [
                "id" => 3,
                "name" => "İsa Sonuyumaz",
                "since" => "2016-02-11",
                "revenue" => "0.00"
            ]
        ];

        $products= [
            [
                "id" => 100,
                "name" => "Black&Decker A7062 40 Parça Cırcırlı Tornavida Seti",
                "category" => 1,
                "price" => "120.75",
                "stock" => 10
            ],
            [
                "id" => 101,
                "name" => "Reko Mini Tamir Hassas Tornavida Seti 32'li",
                "category" => 1,
                "price" => "49.50",
                "stock" => 10
            ],
            [
                "id" => 102,
                "name" => "Viko Karre Anahtar - Beyaz",
                "category" => 2,
                "price" => "11.28",
                "stock" => 10
            ],
            [
                "id" => 103,
                "name" => "Legrand Salbei Anahtar, Alüminyum",
                "category" => 2,
                "price" => "22.80",
                "stock" => 10
            ],
            [
                "id" => 104,
                "name" => "Schneider Asfora Beyaz Komütatör",
                "category" => 2,
                "price" => "12.95",
                "stock" => 10
            ]
        ];

        $orders= [
            [
                "id" => 1,
                "customerId" => 1,
                "items" => [
                    [
                        "productId" => 102,
                        "quantity" => 10,
                        "unitPrice" => "11.28",
                        "total" => "112.80"
                    ]
                ],
                "total" => "112.80"
            ],
            [
                "id" => 2,
                "customerId" => 2,
                "items" => [
                    [
                        "productId" => 101,
                        "quantity" => 2,
                        "unitPrice" => "49.50",
                        "total" => "99.00"
                    ],
                    [
                        "productId" => 100,
                        "quantity" => 1,
                        "unitPrice" => "120.75",
                        "total" => "120.75"
                    ]
                ],
                "total" => "219.75"
            ],
            [
                "id" => 3,
                "customerId" => 3,
                "items" => [
                    [
                        "productId" => 102,
                        "quantity" => 6,
                        "unitPrice" => "11.28",
                        "total" => "67.68"
                    ],
                    [
                        "productId" => 100,
                        "quantity" => 10,
                        "unitPrice" => "120.75",
                        "total" => "1207.50"
                    ]
                ],
                "total" => "1275.18"
            ]
        ];

        foreach ($customers as $customer){
            Customer::create(
                [
                    'id'=>$customer['id'],
                    'name'=>$customer['name'],
                    'since'=>$customer['since'],
                    'revenue'=>$customer['revenue'],
                ]
            );
        }

        foreach ($products as $product){
            Product::create(
                [
                    'id'=>$product['id'],
                    'name'=>$product['name'],
                    'category'=>$product['category'],
                    'price'=>$product['price'],
                    'stock'=>$product['stock'],
                ]
            );
        }

        foreach ($orders as $order){
            Order::create(
                [
                    'customerId'=>$order['customerId'],
                    'items'=>$order['items'],
                    'total'=>$order['total'],
                ]
            );
        }
    }
}
