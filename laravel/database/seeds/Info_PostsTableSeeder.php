<?php

use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use App\Post;
use App\InfoPost;

class Info_PostsTableSeeder extends Seeder
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
            $data = $faker->datetime();

            $newInfoPost = New InfoPost();
            $newInfoPost->post_id = $post->id;
            $newInfoPost->data = $data;
            $newInfoPost->commenti = $faker->randomDigit;
            $newInfoPost->created_at = $data;
            $newInfoPost->updated_at = $data;
            $newInfoPost->save();
        }
    }
}
// $table->bigIncrements('id');
            
//             $table->unsignedBigInteger('post_id');
//             $table->foreign('post_id')
//                 ->references('id')
//                 ->on('posts');

//             $table->string('commenti');
//             $table->date('data');
//             $table->timestamps();