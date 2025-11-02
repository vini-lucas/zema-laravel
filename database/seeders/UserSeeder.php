<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            'password' => 'L4bar3tTA!',
            'status' => 'Ativo'
        ]);

        User::firstOrCreate([
            'name' => 'Lucas 2',
            'cpf' => '86786767',
            'date_birth' => '2006-02-06',
            'gender' => 'masculino',
            'email' => 'lucas2@gmail.com',
            'telephone' => '24323',
            'password' => 'L4bar3tTA!',
            'status' => 'Ativo'
        ]);

        User::firstOrCreate([
            'name' => 'Lucas 3',
            'cpf' => '546456',
            'date_birth' => '2006-02-06',
            'gender' => 'masculino',
            'email' => 'lucas3@gmail.com',
            'telephone' => '123123',
            'password' => 'L4bar3tTA!',
            'status' => 'Ativo'
        ]);

        User::firstOrCreate([
            'name' => 'Lucas 4',
            'cpf' => '4564523423',
            'date_birth' => '2006-02-06',
            'gender' => 'masculino',
            'email' => 'lucas4@gmail.com',
            'telephone' => '23423',
            'password' => 'L4bar3tTA!',
            'status' => 'Ativo'
        ]);

        User::firstOrCreate([
            'name' => 'Lucas 5',
            'cpf' => '2432353466',
            'date_birth' => '2006-02-06',
            'gender' => 'masculino',
            'email' => 'lucas5@gmail.com',
            'telephone' => '234234',
            'password' => 'L4bar3tTA!',
            'status' => 'Ativo'
        ]);

        User::firstOrCreate([
            'name' => 'Lucas 6',
            'cpf' => '2342546657',
            'date_birth' => '2006-02-06',
            'gender' => 'masculino',
            'email' => 'lucas6@gmail.com',
            'telephone' => '234323',
            'password' => 'L4bar3tTA!',
            'status' => 'Ativo'
        ]);

        User::firstOrCreate([
            'name' => 'Lucas 7',
            'cpf' => '2432345356678',
            'date_birth' => '2006-02-06',
            'gender' => 'masculino',
            'email' => 'lucas7@gmail.com',
            'telephone' => '345345',
            'password' => 'L4bar3tTA!',
            'status' => 'Ativo'
        ]);

        User::firstOrCreate([
            'name' => 'Lucas 8',
            'cpf' => '068766532',
            'date_birth' => '2006-02-06',
            'gender' => 'masculino',
            'email' => 'lucas8@gmail.com',
            'telephone' => '78413437',
            'password' => 'L4bar3tTA!',
            'status' => 'Ativo'
        ]);

        User::firstOrCreate([
            'name' => 'Lucas 9',
            'cpf' => '0918309785975',
            'date_birth' => '2006-02-06',
            'gender' => 'masculino',
            'email' => 'lucas9@gmail.com',
            'telephone' => '567567',
            'password' => 'L4bar3tTA!',
            'status' => 'Ativo'
        ]);

        User::firstOrCreate([
            'name' => 'Lucas 10',
            'cpf' => '21312313423',
            'date_birth' => '2006-02-06',
            'gender' => 'masculino',
            'email' => 'lucas10@gmail.com',
            'telephone' => '9789789',
            'password' => 'L4bar3tTA!',
            'status' => 'Ativo'
        ]);
    }
}
