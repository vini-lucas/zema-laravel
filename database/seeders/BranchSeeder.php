<?php

namespace Database\Seeders;

use App\Model\BranchModel as ModelBranchModel;
use App\Models\BranchModel;
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
        if(!BranchModel::where('city', 'São Paulo')->first()) {
            BranchModel::create([
                'cnpj' => '46456464849',
                'email' => 'lojassaopaulo@gmail.com',
                'number_identifier' => 50,
                'telephone' => '43999182166',
                'city' => 'São Paulo'
            ]);
         }

        // Antes de executar a seed e cadastrar na tabela verifica se o seguinte e-mail já existe cadastrado no banco de dados (first() recupera o primeiro registro) 
        if(!BranchModel::where('city', 'Rio de Janeiro')->first()) {
            BranchModel::create([
                'cnpj' => '4874313784',
                'email' => 'lojasriodejaneiro@gmail.com',
                'number_identifier' => 20,
                'telephone' => '43998317999',
                'city' => 'Rio de Janeiro'
            ]);
         }

        // Antes de executar a seed e cadastrar na tabela verifica se o seguinte e-mail já existe cadastrado no banco de dados (first() recupera o primeiro registro) 
        if(!BranchModel::where('city', 'Gramados')->first()) {
            BranchModel::create([
                'cnpj' => '8731434684',
                'email' => 'lojasigramados@gmail.com',
                'number_identifier' => 90,
                'telephone' => '43646434347',
                'city' => 'Gramados'
            ]);
         }
    }
}
