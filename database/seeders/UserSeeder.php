<?php

namespace Database\Seeders;

use App\Models\UserModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Antes de executar a seed e cadastrar na tabela verifica se o seguinte e-mail já existe cadastrado no banco de dados (first() recupera o primeiro registro) 
        if(!UserModel::where('email', 'lucasvini269@gmail.com')->first()) {
            UserModel::create([
                'name' => 'Lucas Vinicius',
                'cpf' => '12428432990',
                'date_birth' => '2006-02-06',
                'gender' => 'masculino',
                'email' => 'lucasvini269@gmail.com',
                'telephone' => '43999859499',
                'password' => 'L4bar3tTA!'
            ]);
         }

         // Antes de executar a seed e cadastrar na tabela verifica se o seguinte e-mail já existe cadastrado no banco de dados (first() recupera o primeiro registro) 
        if(!UserModel::where('email', 'elias@gmail.com')->first()) {
            UserModel::create([
                'name' => 'Elias Miguel',
                'cpf' => '12345678910',
                'date_birth' => '2020-08-13',
                'gender' => 'masculino',
                'email' => 'elias@gmail.com',
                'telephone' => '43123456789',
                'password' => 'L4bar3tTA!'
            ]);
         }

         // Antes de executar a seed e cadastrar na tabela verifica se o seguinte e-mail já existe cadastrado no banco de dados (first() recupera o primeiro registro) 
        if(!UserModel::where('email', 'messi@gmail.com')->first()) {
            UserModel::create([
                'name' => 'Lionel Messi',
                'cpf' => '10987654321',
                'date_birth' => '2000-01-01',
                'gender' => 'masculino',
                'email' => 'messi@gmail.com',
                'telephone' => '43109876543',
                'password' => 'L4bar3tTA!'
            ]);
         }

         // Antes de executar a seed e cadastrar na tabela verifica se o seguinte e-mail já existe cadastrado no banco de dados (first() recupera o primeiro registro) 
        if(!UserModel::where('email', 'kvara@gmail.com')->first()) {
            UserModel::create([
                'name' => 'Kvicha Kvaratskhelia',
                'cpf' => '99999999999',
                'date_birth' => '2001-01-01',
                'gender' => 'masculino',
                'email' => 'kvara@gmail.com',
                'telephone' => '43999999999',
                'password' => 'L4bar3tTA!'
            ]);
         }
    }
}
