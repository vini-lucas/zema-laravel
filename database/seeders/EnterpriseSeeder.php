<?php

namespace Database\Seeders;

use App\Models\EnterpriseModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnterpriseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EnterpriseModel::create([
            'name' => 'Móveis Gazin',
            'cnpj' => '87354798767',
            'email' => 'gazin@gazin.com',
            'telephone' => '43912143546'
        ]);

        EnterpriseModel::create([
            'name' => 'Riachuelo',
            'cnpj' => '48673434874',
            'email' => 'riachuelo@riachuelo.com',
            'telephone' => '43463743546'
        ]);

        EnterpriseModel::create([
            'name' => 'Mercado Móveis',
            'cnpj' => '78976765431',
            'email' => 'mercadomoveis@mm.com',
            'telephone' => '43829489434'
        ]);

        EnterpriseModel::create([
            'name' => 'Casa & Vídeo',
            'cnpj' => '46724987976',
            'email' => 'casaevideo@cev.com',
            'telephone' => '43549843476'
        ]);
    }
}
