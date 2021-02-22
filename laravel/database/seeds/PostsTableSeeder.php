<?php

use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use App\Post;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 6; $i++) { 
            $data = $faker->datetime();

            $newPost = New Post();
            $newPost->titolo = $faker->sentence($nbWords = 3, $variableNbWords = true);
            $newPost->slug = Str::slug($newPost->titolo);
            $newPost->autore = $faker->name();
            $newPost->testo = $faker->text(254);
            $newPost->categoria = $faker->word;
            $newPost->created_at = $data;
            $newPost->updated_at = $data;
            $newPost->save();
        }
    }
}

// $table->bigIncrements('id');
//             $table->string('titolo');
//             $table->string('autore');
//             $table->string('testo');
//             $table->string('categoria');
//             $table->timestamps();