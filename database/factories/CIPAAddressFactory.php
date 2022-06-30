<?php

namespace Database\Factories;

use App\Models\CIPA;
use App\Models\CIPAAddress;
use App\Traits\CommonFunctions;
use Illuminate\Database\Eloquent\Factories\Factory;

class CIPAAddressFactory extends Factory
{
    use CommonFunctions;
    protected $model = CIPAAddress::class;

    public function definition(): array
    {
        return [
            'Company_UIN' => $this->faker->randomElement($this->ids()),
//            'Registered_Office_Address' => $this->faker->words,
            'Postal_Address' => $this->faker->address,
            'Principal_Place_of_Business' => $this->faker->word
        ];
    }
}
