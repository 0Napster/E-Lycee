<?php

use Illuminate\Database\Seeder;

class ScoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 3; $i++) {
            factory(\App\Score::class, 1)->create(['question_id' => $i, 'user_id' => '3']);
            factory(\App\Score::class, 1)->create(['question_id' => $i, 'user_id' => '4']);
        }
        for ($i = 3; $i < 5; $i++) {
            factory(\App\Score::class, 1)->create(['question_id' => $i, 'user_id' => '2']);
            factory(\App\Score::class, 1)->create(['question_id' => $i, 'user_id' => '5']);
            factory(\App\Score::class, 1)->create(['question_id' => $i, 'user_id' => '6']);
            factory(\App\Score::class, 1)->create(['question_id' => $i, 'user_id' => '7']);
        }
    }
}
