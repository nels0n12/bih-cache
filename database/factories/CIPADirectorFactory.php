<?php

namespace Database\Factories;

use App\Models\CIPA;
use App\Models\CIPADirector;
use App\Traits\CommonFunctions;
use Illuminate\Database\Eloquent\Factories\Factory;

class CIPADirectorFactory extends Factory
{
    use CommonFunctions;
    protected $model = CIPADirector::class;

    public function definition(): array
    {
        return [
            'Company_UIN' => $this->faker->randomElement($this->ids()),
            'FullNames' => $this->faker->name,
            'Address' => $this->faker->address,
            'Nationality' => $this->faker->country,
            'Residential_Address' => $this->faker->address,
            'Postal_Address' => $this->faker->address,
            'Appointment_Date' => $this->faker->date
        ];
    }
}
