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
        Role::firstOrCreate(
            ['name' => 'Desenvolvedor'],
            ['name' => 'Desenvolvedor']
        );

        // Permissões do administrador
        $adm = Role::firstOrCreate(
            ['name' => 'Administrador'],
            ['name' => 'Administrador']
        );
        $adm->givePermissionTo([
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

            'users.index',
            'users.show',
            'users.create',
            'users.store',
            'users.edit',
            'users.store',
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

            'branchs.index',
            'branchs.show',
            'branchs.create',
            'branchs.store',
            'branchs.edit',
            'branchs.update',
            'branchs.destroy',

            'login',
            'login.proccess',
            'login.create',
            'login.store',
            
            'recover.create',
            'storeRecover.create',
        ]);

        $supervisor = Role::firstOrCreate(
            ['name' => 'Supervisor'],
            ['name' => 'Supervisor']
        );
        $supervisor->givePermissionTo([
            'profile',
            'profile.edit',
            'profile.update',
            'profile.edit-password',
            'profile.update-password',

            'dashboard',

            'users.index',
            'users.show',
            'users.create',
            'users.store',
            'users.edit',
            'users.store',
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

            'branchs.index',
            'branchs.show',
            'branchs.create',
            'branchs.store',
            'branchs.edit',
            'branchs.update',
            'branchs.destroy',

            'login',
            'login.proccess',
            'login.create',
            'login.store',
            
            'recover.create',
            'storeRecover.create',
        ]);

        $manager = Role::firstOrCreate(
            ['name' => 'Gerente'],
            ['name' => 'Gerente']
        );
        $manager->givePermissionTo([
            'profile',
            'profile.edit',
            'profile.update',
            'profile.edit-password',
            'profile.update-password',

            'dashboard',

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

            'branchs.index',
            'branchs.show',
            'branchs.create',
            'branchs.store',
            'branchs.edit',
            'branchs.update',
            'branchs.destroy',

            'login',
            'login.proccess',
            'login.create',
            'login.store',
            
            'recover.create',
            'storeRecover.create',
        ]);

        $seller = Role::firstOrCreate(
            ['name' => 'Vendedor'],
            ['name' => 'Vendedor']
        );
        $seller->givePermissionTo([
            'profile',
            'profile.edit',
            'profile.update',
            'profile.edit-password',
            'profile.update-password',

            'dashboard',

            'products.index',
            'products.show',
            'products.create',
            'products.store',
            'products.edit',
            'products.update',
            'products.destroy',

            'login',
            'login.proccess',
            'login.create',
            'login.store',
            
            'recover.create',
            'storeRecover.create',
        ]);

        $customer = Role::firstOrCreate(
            ['name' => 'Cliente'],
            ['name' => 'Cliente']
        );
        $customer->givePermissionTo([
            'profile',
            'profile.edit',
            'profile.update',
            'profile.edit-password',
            'profile.update-password',

            'dashboard',

            'login',
            'login.proccess',
            'login.create',
            'login.store',
            
            'recover.create',
            'storeRecover.create',
        ]);
    }
}
