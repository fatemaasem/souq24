<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CategoryStore>
 */
class CategoryStoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name_ar' => $this->faker->randomElement(['ملابس', 'أدوات', 'أحذية', 'كتب', 'ألعاب', 'إلكترونيات']),
            'name_en' => $this->faker->word,
        ];
    }
}
