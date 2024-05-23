<?php

namespace Database\Factories;

use App\Enums\NewsStatusEnum;
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
        return [
            //
            'user_id' => 1,
            'title' => fake()->text(50),
            'description' => fake()->text(),
            'slug' => fake()->slug(),
            'status' => fake()->randomElement(NewsStatusEnum::cases())->value,
        ];
    }
}
