<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CategoryService>
 */
class categoryServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name_ar' => $this->faker->randomElement(['خدمة 1', 'خدمة 2', 'خدمة 3']),
            'name_en' => $this->faker->word, // Generate a random English word
        ];
    }
}
