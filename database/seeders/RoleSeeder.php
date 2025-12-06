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
        $dev->givePermissionTo([
            'index.enterprises',
            'show.enterprises',
            'create.enterprises',
            'edit.enterprises',
            'destroy.enterprises',

            'profile',
            'profile.edit',
            'profile.update',

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
        ]);

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
