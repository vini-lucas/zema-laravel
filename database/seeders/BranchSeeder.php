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
            'enterprise_id' => 1
        ]);

        Branch::firstOrCreate([
            'cnpj' => '75.704.766/0001-56',
            'email' => 'mm_matriz@gmail.com',
            'telephone' => '3546-5678',
            'city' => 'Ibaiti/PR',
            'enterprise_id' => 3
        ]);

        Branch::firstOrCreate([
            'cnpj' => '63.241.040/0001-45',
            'email' => 'provarejo_callcenter@gmail.com',
            'telephone' => '3546-91011',
            'city' => 'Ibaiti/PR',
            'enterprise_id' => 2
        ]);
    }
}
