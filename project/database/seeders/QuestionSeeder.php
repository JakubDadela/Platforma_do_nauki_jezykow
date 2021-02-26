<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Question::factory()->count(5)->create(['quiz_id' => 1, 'is_correct'=> true]);
        Question::factory()->count(5)->create(['quiz_id' => 2, 'is_correct'=> true]);
        Question::factory()->count(5)->create(['quiz_id' => 3, 'is_correct'=> true]);
        Question::factory()->count(5)->create(['quiz_id' => 4, 'is_correct'=> true]);
    }
}
