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
        Status::firstOrCreate([
            'name' => 'Ativo',
            'description' => 'Registro ativo no momento.'
        ]);

        Status::firstOrCreate([
            'name' => 'Inativo',
            'description' => 'Registro inativo no momento.'
        ]);

        Status::firstOrCreate([
            'name' => 'Aguardando confirmação',
            'description' => 'Registro aguardando confirmação para ser ativo.'
        ]);

        Status::firstOrCreate([
            'name' => 'Afastado',
            'description' => 'Registro afastado no momento devido ao tempo de inatividade.'
        ]);
    }
}
