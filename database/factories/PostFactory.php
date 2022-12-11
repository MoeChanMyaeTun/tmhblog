<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()

    {
        $categoryId = Category::has('id')
        ->inRandomOrder()
        ->first()
        ->id;
        return [
            'title' => $this->faker->text(),
            'description' => $this->faker->text(),
            'user_id' => User::inRandomOrder()->first(),
            'category_id' => $categoryId,

            
        ];
    }
}
