<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class, 1)->create(['username' => 'Alexandre', 'password' => bcrypt('soleil'), 'role' => 'teacher']);
        factory(\App\User::class, 3)->create([ 'role' => 'first_class']);
        factory(\App\User::class, 3)->create([ 'role' => 'final_class']);
    }
}
