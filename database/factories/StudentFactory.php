<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'fname' => $this->faker->firstName(),
            'lname' => $this->faker->lastName(),
            'mname' => $this->faker->firstName(),
            'regno' => $this->faker->firstName(),
            'cgpa' => $this->faker->numberBetween(1.0, 4.0),
            'cert_no' => $this->faker->unique()->numberBetween(100000, 900000),
            'program_id' => $this->faker->numberBetween(1, 6),

        ];
    }
}
