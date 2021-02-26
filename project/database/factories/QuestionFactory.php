<?php

namespace Database\Factories;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Question::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'answer'=>$this->faker->word,
            'in_english' => $this->faker->word,
            'quiz_id' => Quiz::factory(),
            'is_correct' => $this->faker->boolean,
            //TODO change to set of 5 values
            'type' => rand(1,4)
        ];
    }
}
