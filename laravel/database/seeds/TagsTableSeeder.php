<?php

use Illuminate\Database\Seeder;
USE App\Tag;
use Illuminate\Support\Str;


class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags =[
            'PHP',
            'Laravel',
            'Javascript',
            'HTML',
            'CSS'
        ];

        foreach ($tags as $tag) {
            $newTag = New Tag();
            $newTag->name = $tag;
            $newTag->slug = Str::slug($tag);

            $newTag->save();

        }
    }
}
