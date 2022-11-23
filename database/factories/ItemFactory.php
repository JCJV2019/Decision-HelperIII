<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'desc' => fake()->sentence(3),
            'point' => fake()->randomElement(['1','2','3','4']),
            'type' => fake()->randomElement(['positive','negative']),
        ];
    }
}
