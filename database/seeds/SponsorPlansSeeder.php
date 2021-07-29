<?php

use Illuminate\Database\Seeder;
use App\Sponsorplan;

class SponsorplansSeeder extends Seeder
{
    // TOADD
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (config('sponsor_plans') as $plan) {
            $new_plan = new Sponsorplan();
            $new_plan->name = $plan['name'];
            $new_plan->pricing = $plan['pricing'];
            $new_plan->duration_in_hours = $plan['duration_in_hours'];
            $new_plan->savings = $plan['savings'];
            $new_plan->save();
        }
    }
}
