<?php

namespace Database\Seeders;

use App\Models\ProductModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductModel::firstOrCreate([
            'store' => 'Casas Freire',
            'description' => 'Playstation 5 Pro',
            'flat' => 'Portáteis(reparo)',
            'months_guarantee' => 12
        ]);

        ProductModel::firstOrCreate([
            'store' => 'Móveis Gazin',
            'description' => 'Playstation 4 Pro',
            'flat' => 'Portáteis(reparo)',
            'months_guarantee' => 12
        ]);

        ProductModel::firstOrCreate([
            'store' => 'Lojas Valdir II',
            'description' => 'Xbox One',
            'flat' => 'Portáteis(reparo)',
            'months_guarantee' => 12
        ]);

        ProductModel::firstOrCreate([
            'store' => 'Lojas Valdir',
            'description' => 'Xbox Series X',
            'flat' => 'Portáteis(reparo)',
            'months_guarantee' => 12
        ]);
    }
}
