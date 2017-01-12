<?php

use Illuminate\Database\Seeder;

class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Question::class, 2)->create(['status' => 'published', 'class_level' => 'premiere']);
        factory(\App\Question::class, 2)->create(['status' => 'published', 'class_level' => 'terminale']);
    }
}
