<?php

namespace Database\Factories;

use App\Models\CIPA;
use App\Models\CIPAShareholder;
use App\Traits\CommonFunctions;
use Illuminate\Database\Eloquent\Factories\Factory;

class CIPAShareholderFactory extends Factory
{
    use CommonFunctions;
    protected $model = CIPAShareholder::class;

    public function definition(): array
    {
        return [
            'Company_UIN' => $this->faker->randomElement($this->ids()),
            'Name' => $this->faker->name,
            'Address' => $this->faker->address,
            'Nationality' => $this->faker->country,
            'Residential_Address' => $this->faker->address,
            'Postal_Address' => $this->faker->address,
            'Nominee_shareholder' => $this->faker->name,
            'Appointment_Date' => $this->faker->date
        ];
    }
}
