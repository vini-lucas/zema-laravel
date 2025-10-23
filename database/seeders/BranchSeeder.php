<?php

namespace Database\Seeders;

use App\Model\BranchModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Antes de executar a seed e cadastrar na tabela verifica se o seguinte e-mail já existe cadastrado no banco de dados (first() recupera o primeiro registro) 
        if(!BranchModel::where('city', 'Ibaiti')->first()) {
            BranchModel::create([
                'cnpj' => '12345678910',
                'email' => 'lojasibaiti@gmail.com',
                'number_identifier' => 10,
                'telephone' => '43999859499',
                'city' => 'Ibaiti'
            ]);
         }

         // Antes de executar a seed e cadastrar na tabela verifica se o seguinte e-mail já existe cadastrado no banco de dados (first() recupera o primeiro registro) 
        if(!BranchModel::where('email', 'elias@gmail.com')->first()) {
            BranchModel::create([
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
        if(!BranchModel::where('email', 'messi@gmail.com')->first()) {
            BranchModel::create([
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
        if(!BranchModel::where('email', 'kvara@gmail.com')->first()) {
            BranchModel::create([
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
