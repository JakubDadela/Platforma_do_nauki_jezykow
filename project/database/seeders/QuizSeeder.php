<?php

namespace Database\Seeders;

use App\Models\Quiz;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Quiz::factory()->count(2)->create(['user_id' => 1, 'language_id' => 1, 'finished' => true]);
        Quiz::factory()->count(2)->create(['user_id' => 2, 'language_id' => 2, 'finished' => true]);
    }
}
