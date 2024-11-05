<?php

namespace Database\Factories;

use App\Models\CategoryPost;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $arabicTitles = ['عنوان المقال 1', 'عنوان المقال 2', 'عنوان المقال 3'];
        $arabicDescriptions = [
            'هذا هو الوصف الأول للمقال.',
            'هذا هو الوصف الثاني للمقال.',
            'هذا هو الوصف الثالث للمقال.',
        ];

        return [
            'title_ar' => $this->faker->randomElement($arabicTitles), // Random Arabic title
            'title_en' => $this->faker->sentence, // Random English title
            'desc_ar' => $this->faker->randomElement($arabicDescriptions), // Random Arabic description
            'desc_en' => $this->faker->paragraph, // Random English description
            'image' => $this->faker->imageUrl(640, 480, 'posts', true, 'Post Image'), // Placeholder image URL
            'categoryPost_id' => CategoryPost::factory(), // Create a new category if needed
        ];
    }
}
