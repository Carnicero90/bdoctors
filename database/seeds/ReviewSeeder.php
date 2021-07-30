<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Review;
use App\User;
use App\Vote;
use Illuminate\Support\Carbon;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // foreach (config('reviews') as $review ) {
        //     $rev = new Review();
        //     $rev->fill($review);
        //     $rev->send_date = Carbon::now()->subDays(rand(0,365));
        //     $rev->service_received = rand(0,1);
        //     $rev->save();
        // }

        for ($i = 0; $i < 350; $i++) {
            $rev = new Review();
            $rev->user_id = rand(1, User::count());
            $rev->vote_id = rand(1, Vote::count());
            $rev->author_name = $faker->name();
            $rev->author_email = $faker->email();
            $rev->content = $faker->paragraph(rand(3,6));
            $rev->send_date = Carbon::now();
            $rev->service_received = rand(0,1);
            $rev->send_date = Carbon::now()->subDays(rand(0,365));
            $rev->save();
        }
    }
}
