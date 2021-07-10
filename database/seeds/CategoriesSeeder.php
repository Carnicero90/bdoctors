<?php

use Illuminate\Database\Seeder;
use App\Category;
class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (config('categories') as $cat) {
            $new_cat = new Category();
            $new_cat->name = $cat['name'];
            $new_cat->slug = $cat['slug'];
            $new_cat->save();
        }
    }
}
