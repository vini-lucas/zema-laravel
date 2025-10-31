<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::firstOrCreate([
            'store' => 'Casas Freire',
            'description' => 'Sofá Frankfurt 3 lugares acento retrátil',
            'flat' => 'Móveis',
            'months_guarantee' => 3,
            'factory_price' => 'R$600,00'
        ]);

        Product::firstOrCreate([
            'store' => 'Lojas Valdir',
            'description' => 'Mesa Frankfurt 4 cadeiras',
            'flat' => 'Móveis',
            'months_guarantee' => 3,
            'factory_price' => 'R$500,00'
        ]);

        Product::firstOrCreate([
            'store' => 'Casas Santa Terezinha',
            'description' => 'Geladeira Consul 220v com congelador',
            'flat' => 'Portáteis - reparo',
            'months_guarantee' => 12,
            'factory_price' => 'R$1.000,00'
        ]);
    }
}
