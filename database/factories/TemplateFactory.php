<?php

namespace Database\Factories;

use App\Models\CategoryStore;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Template>
 */
class TemplateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'desc_ar' => $this->faker->randomElement(['وصف المنتج', 'تفاصيل الخدمة', 'مواصفات العنصر']),
            'desc_en' => $this->faker->sentence,
            'image' => $this->faker->imageUrl(640, 480, 'products', true, 'Example Image'), // Placeholder image URL
            'categoryStore_id' => CategoryStore::factory(), // Creates a new CategoryStore if one doesn’t exist
        ];
    }
}
