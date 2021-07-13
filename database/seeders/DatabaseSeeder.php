<?php

namespace Database\Seeders;

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
        \App\Models\Category::factory(6)->create();
        \App\Models\Product::factory(22)->create();
        \App\Models\HomeSlider::factory(9)->create();
        \App\Models\Favourit::factory(99)->create();
        \App\Models\Setting::factory(1)->create();
        \App\Models\HomeCategory::factory(1)->create();
        \App\Models\TeamMember::factory(10)->create();
    }
}
