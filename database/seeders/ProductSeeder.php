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
            'description' => 'Sofá Frankfurt 3 lugares acento retrátil',
            'months_guarantee' => 3,
            'factory_price' => 'R$600,00',
            'enterprise_id' => 1,
            'flat_id' => 1,
            'enterprise_name' => 'Móveis Gazin',
            'branch' => 1,
            'user' => 1
        ]);

        Product::firstOrCreate([
            'description' => 'Mesa Frankfurt 4 cadeiras',
            'months_guarantee' => 3,
            'factory_price' => 'R$500,00',
            'enterprise_id' => 2,
            'flat_id' => 1,
            'enterprise_name' => 'Pró-Varejo',
            'branch' => 1,
            'user' => 1
        ]);

        Product::firstOrCreate([
            'description' => 'Geladeira Consul 220v com congelador',
            'months_guarantee' => 12,
            'factory_price' => 'R$1.000,00',
            'enterprise_id' => 3,
            'flat_id' => 3,
            'enterprise_name' => 'Mercado Móveis',
            'branch' => 1,
            'user' => 1
        ]);
    }
}
