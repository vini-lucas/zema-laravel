<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Papél desenvolvedor, nível de acesso máximo
        $dev = Role::firstOrCreate(
            ['name' => 'Desenvolvedor'],
            ['name' => 'Desenvolvedor']
        );

        // Permissões do administrador
        $adm = Role::firstOrCreate(
            ['name' => 'Administrador'],
            ['name' => 'Administrador']
        );
        $adm->givePermissionTo([
            'index-enterprises',
            'show-enterprises',
            'create-enterprises',
            'edit-enterprises',
            'destroy-enterprises'
        ]);

        $supervisor = Role::firstOrCreate(
            ['name' => 'Supervisor'],
            ['name' => 'Supervisor']
        );

        $manager = Role::firstOrCreate(
            ['name' => 'Gerente'],
            ['name' => 'Gerente']
        );

        $seller = Role::firstOrCreate(
            ['name' => 'Vendedor'],
            ['name' => 'Vendedor']
        );

        $customer = Role::firstOrCreate(
            ['name' => 'Cliente'],
            ['name' => 'Cliente']
        );
    }
}
