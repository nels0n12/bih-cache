<?php

namespace Database\Seeders;

use App\Models\CIPAAuditor;
use Illuminate\Database\Seeder;

class CIPAAuditorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CIPAAuditor::factory(5000)->create();
    }
}
