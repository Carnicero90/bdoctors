<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Profile;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (config('users_pt_1') as $user) {
            $new_user = new User();
            $new_user->fill($user['user']);
            $new_user->password = Hash::make('cavecanem');
            $new_user->save();
            $profile = new Profile();
            $profile->fill($user['profile']);
            $profile->user_id = $new_user->id;
            $profile->save;
        }
        foreach (config('users') as $user) {

            $new_user = new User();
            $new_user->fill($user);
            $new_user->password = Hash::make('cavecanem');
            $new_user->save();
        }
    }
}