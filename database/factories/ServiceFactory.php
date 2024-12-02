<?php

namespace Database\Factories;

use App\Models\CategoryService;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        $arabicTitles = [' 1', ' 2', ' 3', ' 4', ' 5'];
        $arabicDescriptions = [
            'وصف الخدمة 1',
            'وصف الخدمة 2',
            'وصف الخدمة 3',
            'وصف الخدمة 4',
            'وصف الخدمة 5',
        ];

        return [
            'title_ar' => $this->faker->randomElement($arabicTitles), // Random Arabic title
            'title_en' => $this->faker->word, // Random English word
            'desc_ar' => $this->faker->randomElement($arabicDescriptions), // Random Arabic description
            'desc_en' => $this->faker->sentence, // Random English sentence
            'image' => $this->faker->imageUrl(640, 480, 'services', true, 'Service Image'), // Placeholder image URL
            'categoryService_id' => CategoryService::factory(), // Creates a new categoryService if one doesn’t exist

        ];
    }
}
