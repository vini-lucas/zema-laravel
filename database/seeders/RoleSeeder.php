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

            'index.users',
            'show.users',
            'create.users',
            'edit.users',
            'destroy.users',
            'users.edit-password',
            'users.update-password',

            'index.products',
            'show.products',
            'create.products',
            'edit.products',
            'destroy.products',

            'index.branchs',
            'show.branchs',
            'create.branchs',
            'edit.branchs',
            'destroy.branchs',

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

            'index.users',
            'show.users',
            'create.users',
            'edit.users',
            'destroy.users',
            'users.edit-password',
            'users.update-password',

            'index.products',
            'show.products',
            'create.products',
            'edit.products',
            'destroy.products',

            'index.branchs',
            'show.branchs',
            'create.branchs',
            'edit.branchs',
            'destroy.branchs',

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

            'index.products',
            'show.products',
            'create.products',
            'edit.products',
            'destroy.products',

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
