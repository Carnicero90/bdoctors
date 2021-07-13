<?php

use Illuminate\Database\Seeder;
use App\Service;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(config('performances') as $service) {
            $new_service = new Service();
            $new_service->user_id = $service['user_id'];
            $new_service->title = $service['title'];
            $new_service->hourly_rate = $service['hourly_rate'];
            $new_service->description = $service['description'];
            $new_service->save();
        }
    }
}
