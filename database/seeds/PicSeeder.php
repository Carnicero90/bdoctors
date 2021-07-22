<?php

use Illuminate\Database\Seeder;
use App\Profile;

class PicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 4; $i++) {
            $user = Profile::updateOrCreate(
                ['user_id' => $i],
                ['pic' => 'uploads/user_pics/guitar' . $i . '.jpeg']
            );
        }
    }
}
