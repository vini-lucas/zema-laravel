<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate([
            'name' => 'Lucas Vinicius',
            'cpf' => '12428432990',
            'date_birth' => '2006-02-06',
            'gender' => 'masculino',
            'email' => 'lucasvini269@gmail.com',
            'telephone' => '43999859499',
            'password' => Hash::make('1234'),
            'enterprise' => 'Móveis Gazin',
            'status_id' => 1,
            'branch_id' => 1,
            'level_access_id' => 1
        ])->assignRole('Desenvolvedor');

        // ---------------------------------

        $adm = User::firstOrCreate([
            'name' => 'Administrador',
            'cpf' => '36469642088',
            'date_birth' => '2020-08-13',
            'gender' => 'masculino',
            'email' => 'adm@gmail.com',
            'telephone' => '44996261932',
            'password' => Hash::make('1234'),
            'enterprise' => 'Pró-Varejo',
            'status_id' => 1,
            'branch_id' => 7,
            'level_access_id' => 2
        ]);
        $adm->assignRole('Administrador');

        $supervisor = User::firstOrCreate([
            'name' => 'Supervisor Pró-Varejo',
            'cpf' => '36369642088',
            'date_birth' => '2020-08-13',
            'gender' => 'masculino',
            'email' => 'elias@gmail.com',
            'telephone' => '43996261932',
            'password' => Hash::make('1234'),
            'enterprise' => 'Pró-Varejo',
            'status_id' => 1,
            'branch_id' => 7,
            'level_access_id' => 3
        ]);
        $supervisor->assignRole('Supervisor');

        $manager = User::firstOrCreate([
            'name' => 'Gerente Pró-Varejo',
            'cpf' => '12425612395',
            'date_birth' => '2006-02-17',
            'gender' => 'feminino',
            'email' => 'mylena@gmail.com',
            'telephone' => '43991182166',
            'password' => Hash::make('1234'),
            'enterprise' => 'Pró-Varejo',
            'status_id' => 1,
            'branch_id' => 7,
            'level_access_id' => 4
        ]);
        $manager->assignRole('Gerente');

        $customer = User::firstOrCreate([
            'name' => 'Vendedor Pró-Varejo',
            'cpf' => '05352714926',
            'date_birth' => '1985-04-17',
            'gender' => 'feminino',
            'email' => 'marcia@gmail.com',
            'telephone' => '43991583136',
            'password' => Hash::make('1234'),
            'enterprise' => 'Pró-Varejo',
            'status_id' => 1,
            'branch_id' => 8,
            'level_access_id' => 5
        ]);
        $customer->assignRole('Vendedor');

        // ---------------------------------

        $supervisor = User::firstOrCreate([
            'name' => 'Supervisor Mercado Móveis',
            'cpf' => '36769642088',
            'date_birth' => '2020-08-13',
            'gender' => 'masculino',
            'email' => 'supervisor@gmail.com',
            'telephone' => '43996251932',
            'password' => Hash::make('1234'),
            'enterprise' => 'Mercado Móveis',
            'status_id' => 1,
            'branch_id' => 4,
            'level_access_id' => 3
        ]);
        $supervisor->assignRole('Supervisor');

        $manager = User::firstOrCreate([
            'name' => 'Gerente Mercado Móveis',
            'cpf' => '12425612365',
            'date_birth' => '2006-02-17',
            'gender' => 'feminino',
            'email' => 'gerente@gmail.com',
            'telephone' => '43991182366',
            'password' => Hash::make('1234'),
            'enterprise' => 'Mercado Móveis',
            'status_id' => 1,
            'branch_id' => 4,
            'level_access_id' => 4
        ]);
        $manager->assignRole('Gerente');

        $customer = User::firstOrCreate([
            'name' => 'Vendedor Mercado Móveis',
            'cpf' => '05352714916',
            'date_birth' => '1985-04-17',
            'gender' => 'feminino',
            'email' => 'vendedor@gmail.com',
            'telephone' => '43995583136',
            'password' => Hash::make('1234'),
            'enterprise' => 'Mercado Móveis',
            'status_id' => 1,
            'branch_id' => 5,
            'level_access_id' => 5
        ]);
        $customer->assignRole('Vendedor');

        $customer = User::firstOrCreate([
            'name' => 'Vendedor Gazin',
            'cpf' => '05352714911',
            'date_birth' => '1985-04-17',
            'gender' => 'feminino',
            'email' => 'vendedorGazin@gmail.comM',
            'telephone' => '439955831381',
            'password' => Hash::make('1234'),
            'enterprise' => 'Móveis Gazin',
            'status_id' => 1,
            'branch_id' => 1,
            'level_access_id' => 5
        ]);
        $customer->assignRole('Vendedor');

        $customer = User::firstOrCreate([
            'name' => 'Vendedor Gazin',
            'cpf' => '05352714912',
            'date_birth' => '1985-04-17',
            'gender' => 'feminino',
            'email' => 'vendedorGazin@gmail.comL',
            'telephone' => '439955831382',
            'password' => Hash::make('1234'),
            'enterprise' => 'Móveis Gazin',
            'status_id' => 1,
            'branch_id' => 1,
            'level_access_id' => 5
        ]);
        $customer->assignRole('Vendedor');

        $customer = User::firstOrCreate([
            'name' => 'Vendedor Gazin',
            'cpf' => '05352714913',
            'date_birth' => '1985-04-17',
            'gender' => 'feminino',
            'email' => 'vendedorGazin@gmail.comK',
            'telephone' => '439955831383',
            'password' => Hash::make('1234'),
            'enterprise' => 'Móveis Gazin',
            'status_id' => 1,
            'branch_id' => 1,
            'level_access_id' => 5
        ]);
        $customer->assignRole('Vendedor');

        $customer = User::firstOrCreate([
            'name' => 'Vendedor Gazin',
            'cpf' => '05352714914',
            'date_birth' => '1985-04-17',
            'gender' => 'feminino',
            'email' => 'vendedorGazin@gmail.comJ',
            'telephone' => '439955831384',
            'password' => Hash::make('1234'),
            'enterprise' => 'Móveis Gazin',
            'status_id' => 1,
            'branch_id' => 1,
            'level_access_id' => 5
        ]);
        $customer->assignRole('Vendedor');

        $customer = User::firstOrCreate([
            'name' => 'Vendedor Gazin',
            'cpf' => '05352714915',
            'date_birth' => '1985-04-17',
            'gender' => 'feminino',
            'email' => 'vendedorGazin@gmail.comI',
            'telephone' => '439955831385',
            'password' => Hash::make('1234'),
            'enterprise' => 'Móveis Gazin',
            'status_id' => 1,
            'branch_id' => 1,
            'level_access_id' => 5
        ]);
        $customer->assignRole('Vendedor');

        $customer = User::firstOrCreate([
            'name' => 'Vendedor Gazin',
            'cpf' => '13134234124',
            'date_birth' => '1985-04-17',
            'gender' => 'feminino',
            'email' => 'vendedorGazin@gmail.comH',
            'telephone' => '439955831386',
            'password' => Hash::make('1234'),
            'enterprise' => 'Móveis Gazin',
            'status_id' => 1,
            'branch_id' => 1,
            'level_access_id' => 5
        ]);
        $customer->assignRole('Vendedor');

        $customer = User::firstOrCreate([
            'name' => 'Vendedor Gazin',
            'cpf' => '05352714917',
            'date_birth' => '1985-04-17',
            'gender' => 'feminino',
            'email' => 'vendedorGazin@gmail.comG',
            'telephone' => '439955831387',
            'password' => Hash::make('1234'),
            'enterprise' => 'Móveis Gazin',
            'status_id' => 1,
            'branch_id' => 1,
            'level_access_id' => 5
        ]);
        $customer->assignRole('Vendedor');

        $customer = User::firstOrCreate([
            'name' => 'Vendedor Gazin',
            'cpf' => '05352714918',
            'date_birth' => '1985-04-17',
            'gender' => 'feminino',
            'email' => 'vendedorGazin@gmail.comF',
            'telephone' => '439955831388',
            'password' => Hash::make('1234'),
            'enterprise' => 'Móveis Gazin',
            'status_id' => 1,
            'branch_id' => 1,
            'level_access_id' => 5
        ]);
        $customer->assignRole('Vendedor');

        $customer = User::firstOrCreate([
            'name' => 'Vendedor Gazin',
            'cpf' => '05352714919',
            'date_birth' => '1985-04-17',
            'gender' => 'feminino',
            'email' => 'vendedorGazin@gmail.comE',
            'telephone' => '439955831389',
            'password' => Hash::make('1234'),
            'enterprise' => 'Móveis Gazin',
            'status_id' => 1,
            'branch_id' => 1,
            'level_access_id' => 5
        ]);
        $customer->assignRole('Vendedor');

        $customer = User::firstOrCreate([
            'name' => 'Vendedor Gazin',
            'cpf' => '05352714910',
            'date_birth' => '1985-04-17',
            'gender' => 'feminino',
            'email' => 'vendedorGazin@gmail.comD',
            'telephone' => '439955831310',
            'password' => Hash::make('1234'),
            'enterprise' => 'Móveis Gazin',
            'status_id' => 1,
            'branch_id' => 1,
            'level_access_id' => 5
        ]);
        $customer->assignRole('Vendedor');

        $customer = User::firstOrCreate([
            'name' => 'Vendedor Gazin',
            'cpf' => '05352714011',
            'date_birth' => '1985-04-17',
            'gender' => 'feminino',
            'email' => 'vendedorGazin@gmail.comC',
            'telephone' => '439955831011',
            'password' => Hash::make('1234'),
            'enterprise' => 'Móveis Gazin',
            'status_id' => 1,
            'branch_id' => 1,
            'level_access_id' => 5
        ]);
        $customer->assignRole('Vendedor');

        $customer = User::firstOrCreate([
            'name' => 'Vendedor Gazin',
            'cpf' => '05352714012',
            'date_birth' => '1985-04-17',
            'gender' => 'feminino',
            'email' => 'vendedorGazin@gmail.comB',
            'telephone' => '43995583012',
            'password' => Hash::make('1234'),
            'enterprise' => 'Móveis Gazin',
            'status_id' => 1,
            'branch_id' => 1,
            'level_access_id' => 5
        ]);
        $customer->assignRole('Vendedor');

        $customer = User::firstOrCreate([
            'name' => 'Vendedor Gazin',
            'cpf' => '05352714013',
            'date_birth' => '1985-04-17',
            'gender' => 'feminino',
            'email' => 'vendedorGazin@gmail.comA',
            'telephone' => '43995583013',
            'password' => Hash::make('1234'),
            'enterprise' => 'Móveis Gazin',
            'status_id' => 1,
            'branch_id' => 1,
            'level_access_id' => 5
        ]);
        $customer->assignRole('Vendedor');
    }
}
