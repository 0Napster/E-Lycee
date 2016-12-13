<?php

use Illuminate\Database\Seeder;

class ChoiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Choice::class, 2)->create(['question_id' => '1']);
        factory(\App\Choice::class, 2)->create(['question_id' => '2']);
        factory(\App\Choice::class, 2)->create(['question_id' => '3']);
        factory(\App\Choice::class, 2)->create(['question_id' => '4']);
    }
}
