<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::factory()->create(['user_id' => 1, 'quiz_id' => 1]);
        Comment::factory()->create(['user_id' => 2, 'quiz_id' => 1]);
        Comment::factory()->create(['user_id' => 3, 'quiz_id' => 1]);
        Comment::factory()->create(['user_id' => 4, 'quiz_id' => 1]);
        Comment::factory()->create(['user_id' => 1, 'quiz_id' => 2, 'title' => 'Kuba', 'text' => 'madry gosc']);
    }
}
