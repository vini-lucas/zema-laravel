<?php

namespace Database\Seeders;

use App\Models\LevelAccess;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelAccessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LevelAccess::firstOrCreate([
            'name' => 'Desenvolvedor',
            'description' => 'Nível de acesso máximo do sistema.'
        ]);

        LevelAccess::firstOrCreate([
            'name' => 'Administrador',
            'description' => 'Possui acesso a todas as lojas, usuários e empresas, além de também poder atuar nas propostas pelo lado da mesa de conferência e tirar qualquer tipo de relatório.'
        ]);

        LevelAccess::firstOrCreate([
            'name' => 'Supervisor',
            'description' => 'Pode somente acompanhar e tirar relatório de todas as propostas de sua rede.'
        ]);

        LevelAccess::firstOrCreate([
            'name' => 'Gerente',
            'description' => 'Pode somente acompanhar e tirar relatório de todas as propostas de sua filial.'
        ]);

        LevelAccess::firstOrCreate([
            'name' => 'Vendedor',
            'description' => 'Pode enviar e acompanhar somente as suas propostas e as de seus clientes, além de tirar relatórios também somente de suas propostas e de seus clientes.'
        ]);

        LevelAccess::firstOrCreate([
            'name' => 'Cliente',
            'description' => 'Pode enviar e acompanhar somente as suas propostas, não pode .'
        ]);
    }
}
