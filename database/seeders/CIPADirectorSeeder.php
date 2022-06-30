<?php

namespace Database\Seeders;

use App\Models\CIPADirector;
use Illuminate\Database\Seeder;

class CIPADirectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CIPADirector::factory(5000)->create();
    }
}
