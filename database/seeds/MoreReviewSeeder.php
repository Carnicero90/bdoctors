<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Review;
use App\User;
use App\Vote;

class MoreReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i <25; $i++)
        {
            $rev = new Review();
            $rev->user_id = rand(1, User::count());
            $rev->vote_id = rand(1, Vote::count());
            $rev->author_name = $faker->name();
            $rev->author_email = $faker->email();
            $rev->content = $faker->text();
            $rev->save();
        }
    }
}
