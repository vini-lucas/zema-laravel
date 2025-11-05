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
            'store' => 'Móveis Gazin',
            'description' => 'Sofá Frankfurt 3 lugares acento retrátil',
            'months_guarantee' => 3,
            'factory_price' => 'R$600,00'
        ]);

        Product::firstOrCreate([
            'store' => 'Pró-Varejo',
            'description' => 'Mesa Frankfurt 4 cadeiras',
            'months_guarantee' => 3,
            'factory_price' => 'R$500,00'
        ]);

        Product::firstOrCreate([
            'store' => 'Mercado Móveis',
            'description' => 'Geladeira Consul 220v com congelador',
            'months_guarantee' => 12,
            'factory_price' => 'R$1.000,00'
        ]);
    }
}
