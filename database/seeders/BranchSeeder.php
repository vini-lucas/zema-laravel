<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Branch::firstOrCreate([
            'cnpj' => '25.860.311/0001-51',
            'email' => 'gazin_matriz@gmail.com',
            'telephone' => '3546-1234',
            'city' => 'Ibaiti/PR',
            'enterprise_id' => 1 // Móveis Gazin
        ]);

        Branch::firstOrCreate([
            'cnpj' => '26.860.311/0001-51',
            'email' => 'gazin_figueira@gmail.com',
            'telephone' => '3547-1234',
            'city' => 'Figueira/PR',
            'enterprise_id' => 1 // Móveis Gazin
        ]);

        Branch::firstOrCreate([
            'cnpj' => '27.860.311/0001-51',
            'email' => 'gazin_jaboti@gmail.com',
            'telephone' => '3548-1234',
            'city' => 'Jaboti/PR',
            'enterprise_id' => 1 // Móveis Gazin
        ]);

        Branch::firstOrCreate([
            'cnpj' => '75.704.766/0001-56',
            'email' => 'mm_matriz@gmail.com',
            'telephone' => '3546-5678',
            'city' => 'Ibaiti/PR',
            'enterprise_id' => 3 // MM
        ]);

        Branch::firstOrCreate([
            'cnpj' => '76.704.766/0001-56',
            'email' => 'mm_japira@gmail.com',
            'telephone' => '3547-5678',
            'city' => 'Japira/PR',
            'enterprise_id' => 3 // MM
        ]);

        Branch::firstOrCreate([
            'cnpj' => '77.704.766/0001-56',
            'email' => 'mm_pinhalao@gmail.com',
            'telephone' => '3548-5678',
            'city' => 'Pinhalão/PR',
            'enterprise_id' => 3 // MM
        ]);

        Branch::firstOrCreate([
            'cnpj' => '63.241.040/0001-45',
            'email' => 'provarejo_callcenter@gmail.com',
            'telephone' => '3546-91011',
            'city' => 'Ibaiti/PR',
            'enterprise_id' => 2 // Pró-Varejo
        ]);

        Branch::firstOrCreate([
            'cnpj' => '64.241.040/0001-45',
            'email' => 'provarejo_ourinhos@gmail.com',
            'telephone' => '3547-91011',
            'city' => 'Ourinhos/SP',
            'enterprise_id' => 2 // Pró-Varejo
        ]);

        Branch::firstOrCreate([
            'cnpj' => '65.241.040/0001-45',
            'email' => 'provarejo_sao_paulo@gmail.com',
            'telephone' => '3548-91011',
            'city' => 'São Paulo/SP',
            'enterprise_id' => 2 // Pró-Varejo
        ]);

        Branch::firstOrCreate([
            'cnpj' => '11.111.111/1111-11',
            'email' => 'clientes@gmail.com',
            'telephone' => '3546-1111',
            'city' => 'Brasil',
            'enterprise_id' => 4 // Clientes
        ]);
    }
}
