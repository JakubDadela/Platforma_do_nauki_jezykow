<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'quiz_id' => Quiz::factory(),
            'user_id' => User::factory(),
            'title' => $this->faker->sentence,
            'text' => $this->faker->paragraph,
        ];
    }
}
