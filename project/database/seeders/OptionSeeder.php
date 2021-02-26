<?php

namespace Database\Seeders;

use App\Models\Option;
use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Option::factory()->count(4)->create(['question_id' => 1]);
        Option::factory()->count(4)->create(['question_id' => 2]);
        Option::factory()->count(4)->create(['question_id' => 3]);
        Option::factory()->count(4)->create(['question_id' => 4]);
        Option::factory()->count(4)->create(['question_id' => 5]);
        Option::factory()->count(4)->create(['question_id' => 6]);
        Option::factory()->count(4)->create(['question_id' => 7]);
        Option::factory()->count(4)->create(['question_id' => 8]);
        Option::factory()->count(4)->create(['question_id' => 9]);
        Option::factory()->count(4)->create(['question_id' => 10]);
        Option::factory()->count(4)->create(['question_id' => 11]);
        Option::factory()->count(4)->create(['question_id' => 12]);
        Option::factory()->count(4)->create(['question_id' => 13]);
        Option::factory()->count(4)->create(['question_id' => 14]);
        Option::factory()->count(4)->create(['question_id' => 15]);
        Option::factory()->count(4)->create(['question_id' => 16]);
        Option::factory()->count(4)->create(['question_id' => 17]);
        Option::factory()->count(4)->create(['question_id' => 18]);
        Option::factory()->count(4)->create(['question_id' => 19]);
        Option::factory()->count(4)->create(['question_id' => 20]);
    }
}
