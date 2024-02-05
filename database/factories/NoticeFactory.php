<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notice>
 */
class NoticeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->word(),
            'content' => fake()->text(555),
            'notice_file' => fake()->text(50),
            'notice_banner' => fake()->text(50),
            'notice_date' => fake()->date(),
            'user_id' => User::factory(),
        ];
    }
}
