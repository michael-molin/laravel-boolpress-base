<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
Use App\Post;
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
        for ($i=0; $i < 10; $i++) {
                $post = new Post;
                $post->title = $faker->words(3, true);
                $post->author = $faker->name(null);
                $post->body = $faker->text(150);
                $post->img = 'https://picsum.photos/200/300';
                $post->published = $faker->numberBetween(0, 1);
                $post->slug = Str::slug($post['title'] , '-');
                $post->save();
        }
    }
}
