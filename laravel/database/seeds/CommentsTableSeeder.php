<?php

use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use App\Post;
use App\Comment;

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
            for ($i=0; $i < $faker->numberBetween(1,4); $i++) { 
                $data = $faker->datetime();
    
                $newComment = New Comment();
                $newComment->post_id = $post->id;
                $newComment->testo = $faker->text(100);
                $newComment->autore = $faker->userName;
                $newComment->data = $data;
                $newComment->created_at = $data;
                $newComment->updated_at = $data;
                $newComment->save();
            }
        }
    }
}
    //  $table->bigIncrements('id');
            
    //         $table->unsignedBigInteger('post_id');
    //         $table->foreign('post_id')
    //             ->references('id')
    //             ->on('posts');

    //         $table->string('testo');
    //         $table->string('autore');
    //         $table->date('data');
    //         $table->timestamps();