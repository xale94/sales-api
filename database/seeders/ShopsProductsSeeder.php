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
            ['shop_id' => 1, 'product_id'=>1],['shop_id' => 1, 'product_id'=>2],['shop_id' => 1, 'product_id'=>3],
            ['shop_id' => 2, 'product_id'=>1],['shop_id' => 2, 'product_id'=>2],['shop_id' => 2, 'product_id'=>4],
            ['shop_id' => 3, 'product_id'=>2],['shop_id' => 3, 'product_id'=>3],['shop_id' => 3, 'product_id'=>4],['shop_id' => 3, 'product_id'=>5],
            ['shop_id' => 4, 'product_id'=>5],['shop_id' => 4, 'product_id'=>6],['shop_id' => 4, 'product_id'=>1],
            ['shop_id' => 5, 'product_id'=>1],['shop_id' => 5, 'product_id'=>2],['shop_id' => 5, 'product_id'=>3],
            ['shop_id' => 5, 'product_id'=>4],['shop_id' => 5, 'product_id'=>5],['shop_id' => 5, 'product_id'=>6],
            ['shop_id' => 5, 'product_id'=>7],['shop_id' => 5, 'product_id'=>8],['shop_id' => 5, 'product_id'=>9],['shop_id' => 5, 'product_id'=>10],
        ]);
    }
}
