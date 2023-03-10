<?php

namespace Database\Factories;

use App\Models\Owner;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pet>
 */
class PetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $dogNames = ['Max', 'Lucy', 'Charlie', 'Cooper', 'Betty', 'Leo', 'Duke', 'Stella', 'Lola', 'Bella'];

        return [
            'name' => $this->faker->randomElement($dogNames),
            'dob' => $this->faker->dateTimeBetween($startDate = '-15 years', $endDate = '-1 years', $timezone = null),
            'description' => $this->faker->text(150),
            'owner_id' => $this->faker->randomElement(Owner::pluck('id'))
        ];
    }
}
