<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(OmangSeeder::class);
//        $this->call(CIPASeeder::class);
//        $this->call(CIPAAddressSeeder::class);
//        $this->call(CIPAAuditorSeeder::class);
//        $this->call(CIPADirectorSeeder::class);
//        $this->call(CIPASecretarySeeder::class);
//        $this->call(CIPAShareholderSeeder::class);
    }
}
