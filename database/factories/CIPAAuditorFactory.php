<?php

namespace Database\Factories;

use App\Models\CIPA;
use App\Models\CIPAAuditor;
use App\Traits\CommonFunctions;
use Illuminate\Database\Eloquent\Factories\Factory;

class CIPAAuditorFactory extends Factory
{
    use CommonFunctions;
    protected $model = CIPAAuditor::class;

    public function definition(): array
    {
        return [
            'Company_UIN' => $this->faker->randomElement($this->ids()),
            'Name' => $this->faker->name,
            'Country' => $this->faker->country,
            'Company_Name' => $this->faker->name,
            'UIN' => $this->faker->numerify('BW0000###########'),
            'Registered_Office_Address' => $this->faker->address,
            'Appointment_Date' => $this->faker->date
        ];
    }
}
