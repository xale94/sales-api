<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopsProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('shops_products')->insert([
            ['shop_id' => 1, 'product_id'=>1, 'quantity'=>5],['shop_id' => 1, 'product_id'=>2, 'quantity'=>3],
            ['shop_id' => 1, 'product_id'=>3, 'quantity'=>2],['shop_id' => 2, 'product_id'=>1, 'quantity'=>5],
            ['shop_id' => 2, 'product_id'=>2, 'quantity'=>9],['shop_id' => 2, 'product_id'=>4, 'quantity'=>13],
            ['shop_id' => 3, 'product_id'=>2, 'quantity'=>5],['shop_id' => 3, 'product_id'=>3, 'quantity'=>5],
            ['shop_id' => 3, 'product_id'=>4, 'quantity'=>5],['shop_id' => 3, 'product_id'=>5, 'quantity'=>5],
            ['shop_id' => 4, 'product_id'=>5, 'quantity'=>5],['shop_id' => 4, 'product_id'=>6, 'quantity'=>5],
            ['shop_id' => 4, 'product_id'=>1, 'quantity'=>5],['shop_id' => 5, 'product_id'=>1, 'quantity'=>5],
            ['shop_id' => 5, 'product_id'=>2, 'quantity'=>5],['shop_id' => 5, 'product_id'=>3, 'quantity'=>5],
            ['shop_id' => 5, 'product_id'=>4, 'quantity'=>5],['shop_id' => 5, 'product_id'=>5, 'quantity'=>5],
            ['shop_id' => 5, 'product_id'=>6, 'quantity'=>5],['shop_id' => 5, 'product_id'=>7, 'quantity'=>5],
            ['shop_id' => 5, 'product_id'=>8, 'quantity'=>5],['shop_id' => 5, 'product_id'=>9, 'quantity'=>5],
            ['shop_id' => 5, 'product_id'=>10, 'quantity'=>5],
        ]);
    }
}
