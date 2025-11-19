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
            'status_id' => 1,
            'branch_id' => 3,
            'level_access_id' => 1
        ]);

        User::firstOrCreate([
            'name' => 'Elias Miguel',
            'cpf' => '36369642088',
            'date_birth' => '2020-08-13',
            'gender' => 'masculino',
            'email' => 'elias@gmail.com',
            'telephone' => '4396261932',
            'password' => Hash::make('1234'),
            'status_id' => 3,
            'branch_id' => 1,
            'level_access_id' => 2
        ]);

        User::firstOrCreate([
            'name' => 'Márcia Denise dos Santos',
            'cpf' => '05352714926',
            'date_birth' => '1985-04-17',
            'gender' => 'feminino',
            'email' => 'marcia@gmail.com',
            'telephone' => '4391583136',
            'password' => Hash::make('1234'),
            'status_id' => 4,
            'branch_id' => 2,
            'level_access_id' => 3
        ]);
    }
}
