<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $title = $this->faker->sentence(2);
        return [
            'title' => rtrim($title, '.'),
            'content' => fake()->paragraph(5),
            'banner_image' => 'images/default.jpg',
            'admin_id' => Admin::factory(),
        ];
    }
}
