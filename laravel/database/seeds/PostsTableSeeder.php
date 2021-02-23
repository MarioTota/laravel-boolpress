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
            $newPost->sottotitolo = $faker->sentence($nbWords = 6, $variableNbWords = true);
            $newPost->slug = Str::slug($newPost->titolo);
            $newPost->testo = $faker->text(254);
            $newPost->autore = $faker->name();
            $newPost->immagine = 'https://www.architetturaecosostenibile.it/images/stories/2016/promuoviamo-paesaggio-italiano.jpg';
            $newPost->data_pubblicazione = $data;
            $newPost->created_at = $data;
            $newPost->updated_at = $data;
            $newPost->save();
        }
    }
}
//  $table->string('titolo');
//             $table->string('slug');
//             $table->string('sottotitolo');
//             $table->string('testo');
//             $table->string('autore');
//             $table->string('immagine');
//             $table->string('data_pubblicazione');