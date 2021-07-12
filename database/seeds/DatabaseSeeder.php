<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(VotesTableSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(SponsorplansSeeder::class);
        $this->call(MessageSeeder::class);
        $this->call(CategoryUserSeeder::class);
    }
}
