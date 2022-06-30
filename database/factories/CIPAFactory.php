<?php

namespace Database\Factories;

use App\Models\CIPA;
use Illuminate\Database\Eloquent\Factories\Factory;

class CIPAFactory extends Factory
{
    protected $model = CIPA::class;

    public function definition(): array
    {
        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July ', 'August', 'September', 'October', 'November', 'December'];
        return [
            'UIN' => $this->faker->unique()->numerify('BW0000###########'),
            'Company_Status' => $this->faker->randomElement(['Registered', 'Not Registered']),
            'Foreign_Company' => $this->faker->randomElement([true,false, 'not specified']),
            'Exempt' => $this->faker->boolean,
            'Incorporation_Date' => $this->faker->date(),
            'Re-Registration_Date' => $this->faker->date(),
            'Have_own_constitution' => $this->faker->boolean,
            'Annual_Return_Filing_Month' => $this->faker->randomElement($months),
            'Annual_Return_last_filed_on' => $this->faker->date()
        ];
    }
}
