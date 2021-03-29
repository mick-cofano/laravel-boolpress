<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Author;
use App\AuthorDetails;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $faker->addProvider(new WW\Faker\Provider\Picture($faker));

        $author = new Author();
        $author->name = 'John';
        $author->surname = 'Pippo';
        $author->email = 'pippo@example.com';
        $author->save();


        $authorDetails = new AuthorDetails();
        $authorDetails->bio = 'Lorem Ipsum';
        $authorDetails->website = 'http://example.com';
        $authorDetails->pic = $faker->pictureUrl(250, 250);

        $author->detail()->save($authorDetails);
    }
}
