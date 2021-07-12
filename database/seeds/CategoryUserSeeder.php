<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Category;

class CategoryUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Assegnamo una categoria random a tutti gli user presenti nel db
        $users = User::all();
        $categories = Category::select('id')->pluck('id')->toArray();
        foreach ($users as $user) {
            $user->categories()->attach($categories[array_rand($categories)]);
        };


    }
}
