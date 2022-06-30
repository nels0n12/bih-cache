<?php

namespace Database\Factories;

use App\Models\Omang;
use Illuminate\Database\Eloquent\Factories\Factory;

class OmangFactory extends Factory
{
    protected $model = Omang::class;

    public function definition(): array
    {
        $places = ['Mahalapye', 'Serowe', 'Gaborone', 'Francistown', 'Palapye'];
        return [
            'ID_NO' => $this->faker->unique()->numerify('#########'),
            'SURNME' => $this->faker->lastName,
            'FIRST_NME' => $this->faker->firstName,
            'SEX' => $this->faker->randomElement(['male', 'female','other']),
            'BIRTH_DTE' => $this->faker->date,
            'BIRTH_PLACE_NME' => $this->faker->randomElement($places),
            'MARITAL_STATUS_DESCR' => $this->faker->text,
            'SPOUSE_NME' => $this->faker->name,
            'PERSON_STATUS' => $this->faker->randomElement(['alive','deceased']),
            'BIRTH_DTE_UNKNOWN' => '',
            'OCCUPATION_CDE' => $this->faker->numerify('####'),
            'OCCUPATION_DESCR' => $this->faker->text,
            'RESIDENTIAL_ADDR' => $this->faker->address,
            'POSTAL_ADDR' => $this->faker->address,
            'MARITAL_STATUS_CDE' => $this->faker->numerify('#####'),
            'DISTRICT_CDE' => $this->faker->numerify('#####'),
            'DISTRICT_NME' => $this->faker->randomElement($places),
            'APPLICATION_PLACE_CDE' => $this->faker->numerify('####'),
            'APPLICATION_PLACE_NME' => $this->faker->randomElement($places),
            'APPLICATION_NO' => $this->faker->numerify('#####'),
            'CHANGE_DTE' => $this->faker->date,
            'EXPIRY_DTE' => $this->faker->date,
            'DECEASED_DTE' => $this->faker->date,
            'DECEASED_DTE_UNKNOWN' => '',
            'DEATH_CERT_NO' => $this->faker->numerify('####'),
            'CITIZEN_STATUS_CDE' => $this->faker->numerify('####'),
            'CITIZEN_STATUS_DTE' => $this->faker->date

        ];
    }
}
