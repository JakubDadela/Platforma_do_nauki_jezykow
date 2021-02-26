<?php

namespace Database\Seeders;

use App\Models\Result;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
//        $this->call(LanguageSeeder::class);
//        $this->call(QuizSeeder::class);
//        $this->call(QuestionSeeder::class);
//        $this->call(OptionSeeder::class);
//        $this->call(CommentSeeder::class);
//        $this->call(ResultSeeder::class);
    }
}
