<?php

namespace Database\Seeders;

use App\Models\Enterprise;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnterpriseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Enterprise::firstOrCreate([
            'name' => 'Móveis Gazin',
            'email' => 'gazin@gmail.com',
            'website' => 'gazin.com.br',
            'status_id' => 'Ativo',
            'logo' => 'gazin.png'
        ]);

        Enterprise::firstOrCreate([
            'name' => 'Pró-Varejo',
            'email' => 'provarejo@gmail.com',
            'website' => 'provarejotop.com.br',
            'status_id' => 'Inativo',
            'logo' => 'provarejo.png'
        ]);

        Enterprise::firstOrCreate([
            'name' => 'Mercado Móveis',
            'email' => 'mm@gmail.com',
            'website' => 'mercadomoveis.com.br',
            'status_id' => 'Aguardando confirmação',
            'logo' => 'mm.png'
        ]);
    }
}
