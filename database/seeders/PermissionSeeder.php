<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Criar um array de páginas
        $permissions = [
            'index-enterprises',
            'show-enterprises',
            'create-enterprises',
            'edit-enterprises',
            'destroy-enterprises',
        ];

        foreach ($permissions as $permission) {
            // Se não encontrar o registro cadastra-o no banco de dados
            Permission::firstOrCreate(
                ['name' => $permission],
                [
                    'name' => $permission,
                    'guard_name' => 'web'
                ]
            );
        }
    }
}
