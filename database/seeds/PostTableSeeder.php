<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $upload = public_path('assets/images/posts');

        $files = File::allFiles($upload);

        foreach ($files as $file) {
            File::delete($file);
        }

        factory(\App\Post::class, 15)->create()->each(function ($post) use ($upload) {
            dl_images($post, $upload, 'tall');
        });
    }
}
