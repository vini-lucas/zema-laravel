<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Executa as seeders criadas
     */
    public function run(): void
    {
        // A sequência de classes que estiver aqui será a mesma que será criada quando o comando for executado
        $this->call([
            UserSeeder::class,
            EnterpriseSeeder::class
        ]);
    }
}
