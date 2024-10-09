<?php

namespace Database\Seeders;

use App\Models\Warehouse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Warehouse::create(['id' => 'wh-surabaya', 'name' => 'Surabaya']);
        Warehouse::create(['id' => 'wh-malang', 'name' => 'Malang']);
        Warehouse::create(['id' => 'wh-jakarta', 'name' => 'Jakarta']);
    }
}
