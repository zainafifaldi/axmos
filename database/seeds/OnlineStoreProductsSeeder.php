<?php

use App\Models\OnlineStore\Product,
    Illuminate\Database\Seeder;

class OnlineStoreProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            ['Kue Enak', 10],
            ['Kaos Anak Gaul', 5],
            ['Permen Karet Bahagia', 100],
        ];

        foreach($products as $product) {
            $product_to_insert['name']      = $product[0];
            $product_to_insert['quantity']  = $product[1];

            Product::create($product_to_insert);
        }
    }
}
