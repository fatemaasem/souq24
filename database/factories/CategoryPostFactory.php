<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CategoryPost>
 */
class CategoryPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $arabicNames = ['المنشور2','المنشور1'];
        return [
            'name_ar' => $this->faker->randomElement($arabicNames), // Random Arabic name
            'name_en' => $this->faker->word, // Random English word
        ];
    }
}
