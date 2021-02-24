<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PostsTableSeeder::class,
            InfoPostsTableSeeder::class,
            CommentsTableSeeder::class,
            TagsTableSeeder::class,
            ImagesTableSeeder::class
        ]);
    }
}
