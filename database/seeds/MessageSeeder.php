<?php

use Illuminate\Database\Seeder;
use App\Message;
use Faker\Generator as Faker;

class MessageSeeder extends Seeder
// TODO: cambia nome
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {

            $new_message = new Message();
            $new_message->author_name = $faker->firstName() . ' ' . $faker->lastName();
            $new_message->author_email = $faker->email();
            $new_message->text = $faker->paragraph();
            $new_message->message_date = $faker->date();
            $new_message->user_id = 1;
            $new_message->save();
        }
    }
}
