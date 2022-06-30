<?php

namespace Database\Seeders;

use App\Models\Omang;
use Illuminate\Database\Seeder;

class OmangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Omang::factory(1000)->create();
    }
}
