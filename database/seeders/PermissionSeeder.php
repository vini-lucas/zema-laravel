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
            'index.enterprises',
            'show.enterprises',
            'create.enterprises',
            'edit.enterprises',
            'destroy.enterprises',

            'profile',
            'profile.edit',
            'profile.update',
            'profile.edit-password',
            'profile.update-password',

            'dashboard',

            'edited.records',

            'index.users',
            'show.users',
            'create.users',
            'edit.users',
            'destroy.users',
            'users.select-enterprise-update',
            'users.select-active-update',
            'users.edit-password',
            'users.update-password',

            'index.products',
            'show.products',
            'create.products',
            'edit.products',
            'destroy.products',

            'index.flats',
            'show.flats',
            'create.flats',
            'edit.flats',
            'destroy.flats',

            'index.branchs',
            'show.branchs',
            'create.branchs',
            'edit.branchs',
            'destroy.branchs',

            'index.statuses',
            'show.statuses',
            'create.statuses',
            'edit.statuses',
            'destroy.statuses',

            'index.levels_access',
            'show.levels_access',
            'create.levels_access',
            'edit.levels_access',
            'destroy.levels_access',

            'login',
            'login.proccess',
            'login.create',
            'login.store',
            
            'recover.create',
            'storeRecover.create',
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
