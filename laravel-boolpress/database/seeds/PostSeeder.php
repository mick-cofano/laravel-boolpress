<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Author;
use App\AuthorDetails;
use App\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
            for($i =0; $i < 20; $i++) {

            $author = new Author();
            $author->name = $faker->firstName();
            $author->surname = $faker->lastName();
            $author->email = $faker->email();
            $author->save();


            $authorDetail = new AuthorDetails();
            $authorDetail->bio = $faker->text();
            $authorDetail->website = $faker->url();
            $authorDetail->pic = 'https://picsum.photos/seed/'.rand(1,1000).'/200/300';
            $author->detail()->save($authorDetail);


            for($x = 0; $x < rand(2, 5); $x++) {
                $post = new Post();
                $post->title = $faker->text(20);
                $post->body = $faker->text(1000);
                $author->posts()->save($post);
            }

            
        }
    }
}
