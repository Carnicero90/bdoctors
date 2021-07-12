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
        foreach (config('users') as $user) {

            $new_user = new User();
            $new_user->fill($user);
            $new_user->password = Hash::make('cavecanem');
            $new_user->save();
        }
    }
}