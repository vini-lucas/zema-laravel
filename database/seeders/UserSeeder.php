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
            'cpf' => '05352714919',
            'date_birth' => '1985-04-17',
            'gender' => 'feminino',
            'email' => 'vendedorGazin@gmail.com',
            'telephone' => '43995583138',
            'password' => Hash::make('1234'),
            'enterprise' => 'Móveis Gazin',
            'status_id' => 1,
            'branch_id' => 1,
            'level_access_id' => 5
        ]);
        $customer->assignRole('Vendedor');
    }
}
