<?php

namespace Database\Seeders;

use App\Models\Flat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FlatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Flat::firstOrCreate([
            'name' => 'Móveis',
            'description' => 'Móveis em geral (ex.: cama, armário, roupeiro)',
            'months_guarantee' => 3
        ]);

        Flat::firstOrCreate([
            'name' => 'Portáteis - troca',
            'description' => 'Produtos portáteis (geralmente utilizam eletricidade) com preço de fábrica inferior à R$450,00 (ex.: caixa de som, carregador de telefone).',
            'months_guarantee' => 12
        ]);

        Flat::firstOrCreate([
            'name' => 'Portáteis - reparo',
            'description' => 'Produtos portáteis (geralmente utilizam eletricidade) com preço de fábrica superior à R$450,00 (ex.: geladeira, monitor).',
            'months_guarantee' => 12
        ]);
    }
}
