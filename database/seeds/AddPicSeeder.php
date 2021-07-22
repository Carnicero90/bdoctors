<?php

use Illuminate\Database\Seeder;
use App\Profile;

class AddPicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 9; $i++) {
            $profile = Profile::updateOrCreate(
                ['user_id' => $i + count(config('users_pt_1'))],
                [ 'pic' => 'img/foto' . $i . '.jpg']
            );
        }
    }
}
