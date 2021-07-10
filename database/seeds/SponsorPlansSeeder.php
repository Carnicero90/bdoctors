<?php

use Illuminate\Database\Seeder;
use App\SponsorPlan;

class SponsorPlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       foreach (config('sponsor_plans') as $plan) {
           
        $new_plan = new SponsorPlan();

        $new_plan->name = $plan['name'];
        $new_plan->duration_in_hours = $plan['duration_in_hours'];
        $new_plan->description = $plan['description'];
        $new_plan->pricing = $plan['pricing'];
        $new_plan->slug = $plan['slug'];
        $new_plan->save();
       }
    }
}
