<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=>Str::limit(fake()->sentence() , 40),
            'content' => fake()->text(200),
            'user_id' => rand(1,10),
            'image'=> fake()->imageUrl(640, 480, 'animals', true),
        ];
    }
}
