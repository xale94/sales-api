<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('shops')->insert([
            ['name' => 'Tienda A'],
            ['name' => 'Tienda B'],
            ['name' => 'Tienda C'],
            ['name' => 'Tienda D'],
            ['name' => 'Tienda E'],
        ]);
    }
}
