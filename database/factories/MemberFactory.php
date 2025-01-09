<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Department;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'age' => fake()->numberBetween(1, 80),
            'skill' => fake()->numberBetween(0, 100),
            'bio' => fake()->realText(),
        
            //inRandomOrder() - To grab the random department record and assign it to random members
            //first() -> - to grab the first id records
            'department_id' => Department::inRandomOrder()->first()->id
        ];
    }
}
