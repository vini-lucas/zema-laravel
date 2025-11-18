<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::fistOrCreate([
            'name' => 'Ativo',
            'description' => 'Registro ativo no momento.'
        ]);

        Status::fistOrCreate([
            'name' => 'Inativo',
            'description' => 'Registro inativo no momento.'
        ]);

        Status::fistOrCreate([
            'name' => 'Aguardando confirmação',
            'description' => 'Registro aguardando confirmação para ser ativo.'
        ]);

        Status::fistOrCreate([
            'name' => 'Afastado',
            'description' => 'Registro afastado no momento devido ao tempo de inatividade.'
        ]);
    }
}
