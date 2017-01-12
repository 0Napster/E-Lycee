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

        $upload = public_path('assets/images/users');

        $files = File::allFiles($upload);

        foreach ($files as $file) {
            File::delete($file);
        }

        factory(\App\User::class, 1)->create(['username' => 'Alexandre', 'password' => bcrypt('soleil'), 'role' => 'teacher'])->each(function ($user) use ($upload) {
            dl_images($user, $upload, 'small');
        });
        factory(\App\User::class, 1)->create(['username' => 'Corentin', 'password' => bcrypt('soleil'), 'role' => 'final_class'])->each(function ($user) use ($upload) {
            dl_images($user, $upload, 'small');
        });
        factory(\App\User::class, 2)->create(['role' => 'first_class'])->each(function ($user) use ($upload) {
            dl_images($user, $upload, 'small');
        });
        factory(\App\User::class, 3)->create(['role' => 'final_class'])->each(function ($user) use ($upload) {
            dl_images($user, $upload, 'small');
        });
    }
}
