<?php

use Illuminate\Database\Seeder;
use App\Vote;

class VotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (config('votes') as $vote) {
            $new_vote = new Vote();
            $new_vote->value = $vote['value'];
            $new_vote->label = $vote['label'];
            $new_vote->save();
        }
    }
}
