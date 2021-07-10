<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {

            $new_user = new User();
            $new_user->name = $faker->firstName();
            $new_user->lastname = $faker->lastName();
            $new_user->address = $faker->address();
            $new_user->email = $faker->email();;
            $new_user->password = str_replace(" ", "", $faker->words(3, true));
            $new_user->save();
        }
    }
}