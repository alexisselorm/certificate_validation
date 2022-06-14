<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Program>
 */
class ProgramFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

                'short_name' => $this->faker->firstName(),
                'long_name' => $this->faker->name(),
                'duration' => $this->faker->numberBetween(2, 4),
                'program_run_type_id' => $this->faker->numberBetween(1, 3),
                'program_type_id' => $this->faker->numberBetween(1, 3),
            
        ];
    }
}
