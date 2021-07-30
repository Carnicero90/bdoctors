<?php

use Illuminate\Database\Seeder;
use App\Message;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;
use App\User;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 350; $i++) {
            $new_message = new Message();
            $new_message->author_name = $faker->firstName() . ' ' . $faker->lastName();
            $new_message->author_email = $faker->email();
            $new_message->text = $faker->paragraph(rand(3,6));
            $new_message->message_date = Carbon::now()->subDays(rand(0,365));
            $new_message->user_id = rand(1, User::count());
            $new_message->to_show = 1;
            $new_message->to_read = 1;
            $new_message->save();
        }
    }
}
