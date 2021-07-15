<?php

use Illuminate\Database\Seeder;
use App\SponsorplanUser;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class SponsorplanUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sponsor_plan_users = [
            [
                'user_id' => 1,
                'sponsorplan_id' => 1,
                'order_date' => Carbon::now(),
                'end_date' => Carbon::now()->addHours(24),
                'invoice' => 'Fattura n° ' . rand(1000, 1999),
                'success' => 1
            ],
            [
                'user_id' => 2,
                'sponsorplan_id' => 2,
                'order_date' => Carbon::now(),
                'end_date' => Carbon::now()->addHours(72),
                'invoice' => 'Fattura n° ' . rand(1000, 1999),
                'success' => 1
            ],
            [
                'user_id' => 3,
                'sponsorplan_id' => 3,
                'order_date' => Carbon::now(),
                'end_date' => Carbon::now()->addHours(144),
                'invoice' => 'Fattura n° ' . rand(1000, 1999),
                'success' => 1
            ],
            [
                'user_id' => 4,
                'sponsorplan_id' => 1,
                'order_date' => Carbon::now(),
                'end_date' => Carbon::now()->addHours(24),
                'invoice' => 'Fattura n° ' . rand(1000, 1999),
                'success' => 1
            ],
            [
                'user_id' => 5,
                'sponsorplan_id' => 2,
                'order_date' => Carbon::now(),
                'end_date' => Carbon::now()->addHours(72),
                'invoice' => 'Fattura n° ' . rand(1000, 1999),
                'success' => 1
            ],
            [
                'user_id' => 6,
                'sponsorplan_id' => 3,
                'order_date' => Carbon::now(),
                'end_date' => Carbon::now()->addHours(144),
                'invoice' => 'Fattura n° ' . rand(1000, 1999),
                'success' => 1
            ],
            [
                'user_id' => 7,
                'sponsorplan_id' => 2,
                'order_date' => Carbon::now(),
                'end_date' => Carbon::now()->addHours(72),
                'invoice' => 'Fattura n° ' . rand(1000, 1999),
                'success' => 1
            ],
        ];

        foreach($sponsor_plan_users as $plan_user) {

            $new_plan_user = new SponsorplanUser();
            $new_plan_user->user_id = $plan_user['user_id'];
            $new_plan_user->sponsorplan_id = $plan_user['sponsorplan_id'];
            $new_plan_user->order_date = $plan_user['order_date'];
            $new_plan_user->end_date = $plan_user['end_date'];
            $new_plan_user->invoice = $plan_user['invoice'];
            $new_plan_user->success = $plan_user['success'];
            
            $new_plan_user->save();
        }
    }
}