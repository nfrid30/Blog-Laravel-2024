<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
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
        $title = fake()->sentence(2);

        return [
            'title' => $title,
            'slug' => str($title)->slug()->toString(),
            'description' => fake()->text(50),
            'text' => fake()->text(2000),
            'created_at' => fake()->dateTimeBetween( '-1 year'),
            'image' => 'Images/' . rand(1, 5) . '.jpg',
            'user_id' => User::query()->inRandomOrder()->value('id'),
            'category_id' => Category::query()->inRandomOrder()->value('id'),
        ];
    }
}
