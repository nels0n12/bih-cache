<?php

namespace Database\Seeders;

use App\Models\CIPA;
use Illuminate\Database\Seeder;

class CIPASeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CIPA::factory(2000)->create();
    }
}
