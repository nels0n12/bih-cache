<?php

namespace Database\Seeders;

use App\Models\CIPASecretary;
use Illuminate\Database\Seeder;

class CIPASecretarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CIPASecretary::factory(5000)->create();
    }
}
