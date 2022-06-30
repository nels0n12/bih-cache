<?php

namespace Database\Seeders;

use App\Models\CIPAAddress;
use Illuminate\Database\Seeder;

class CIPAAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CIPAAddress::factory(5000)->create();
    }
}
