<?php

namespace Database\Factories;

use App\Models\CIPA;
use App\Models\CIPASecretary;
use App\Traits\CommonFunctions;
use Illuminate\Database\Eloquent\Factories\Factory;

class CIPASecretaryFactory extends Factory
{
    use CommonFunctions;
    protected $model = CIPASecretary::class;

    public function definition(): array
    {
        return [
            'Company_UIN' => $this->faker->randomElement($this->ids()),
            'Name' => $this->faker->name,
            'Address' => $this->faker->address,
            'Company_Name' => $this->faker->name,
            'UIN' => $this->faker->numerify('BW0000###########'),
            'Registered_Office_Address' => $this->faker->address,
            'Representative_Name' => $this->faker->name,
            'Representative_Postal_Address' => $this->faker->address,
            'Appointment_Date' => $this->faker->date
        ];
    }
}
