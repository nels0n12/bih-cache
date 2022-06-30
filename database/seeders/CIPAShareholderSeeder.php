<?php

namespace Database\Seeders;

use App\Models\CIPAShareholder;
use Illuminate\Database\Seeder;

class CIPAShareholderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CIPAShareholder::factory(5000)->create();
    }
}
