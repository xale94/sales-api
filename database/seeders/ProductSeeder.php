<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            ['name' => 'Set de manteles'],
            ['name' => 'Estantería'],
            ['name' => 'Armario'],
            ['name' => 'Sofá'],
            ['name' => 'Silla'],
            ['name' => 'Mesa'],
            ['name' => 'Cubiertos'],
            ['name' => 'Juego de sartenes'],
            ['name' => 'Set de cuchillos'],
            ['name' => 'Cojines']
        ]);
    }
}
