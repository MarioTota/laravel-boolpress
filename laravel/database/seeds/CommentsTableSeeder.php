<?php

use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
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
        //
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