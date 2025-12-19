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
            'enterprises.index',
            'enterprises.show',
            'enterprises.create',
            'enterprises.store',
            'enterprises.edit',
            'enterprises.update',
            'enterprises.destroy',

            'profile',
            'profile.edit',
            'profile.update',
            'profile.edit-password',
            'profile.update-password',

            'dashboard',

            'records.edited',

            'users.index',
            'users.show',
            'users.create',
            'users.store',
            'users.edit',
            'users.update',
            'users.destroy',
            'users.select-enterprise-update',
            'users.select-active-update',
            'users.select-enterprise',
            'users.select-enterprise-active',
            'users.edit-password',
            'users.update-password',

            'products.index',
            'products.show',
            'products.create',
            'products.store',
            'products.edit',
            'products.update',
            'products.destroy',

            'flats.index',
            'flats.show',
            'flats.create',
            'flats.store',
            'flats.edit',
            'flats.update',
            'flats.destroy',

            'inss.index',
            'inss.show',
            'inss.create',
            'inss.store',
            'inss.edit',
            'inss.update',
            'inss.destroy',

            'branchs.index',
            'branchs.show',
            'branchs.create',
            'branchs.store',
            'branchs.edit',
            'branchs.update',
            'branchs.destroy',

            'statuses.index',
            'statuses.show',
            'statuses.create',
            'statuses.store',
            'statuses.edit',
            'statuses.update',
            'statuses.destroy',

            'levels_access.index',
            'levels_access.show',
            'levels_access.create',
            'levels_access.store',
            'levels_access.edit',
            'levels_access.update',
            'levels_access.destroy',

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
