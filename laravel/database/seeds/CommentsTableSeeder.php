<?php

use Illuminate\Database\Seeder;
use App\Comment;
use App\Post;
use Faker\Generator as Faker;


class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $posts = Post::all();

        foreach ($posts as $post) { 
            
            for ($i=0; $i < 3; $i++) { 
                $newComment = New Comment();
                
                $data = $faker->datetime();
                $newComment->post_id = $post->id;
                $newComment->autore = $faker->userName;
                $newComment->testo = $faker->sentence(10);
                $newComment->created_at = $data;
                $newComment->updated_at = $data;
    
                $newComment->save();
            }
        }
    }
}
