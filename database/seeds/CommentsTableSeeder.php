<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 16; $i++) {
            factory(App\Comment::class, 1)->create(['post_id' => $i]);
        }
    }
}
