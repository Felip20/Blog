<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Blog;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::truncate();
        Category::truncate();
        Blog::truncate();

        $fro=Category::factory()->create(['name'=>'frontend']);
        $bac=Category::factory()->create(['name'=>'Backend']);

        Blog::factory(2)->create(['category_id'=>$fro->id]);
        Blog::factory(2)->create(['category_id'=>$bac->id]);

    }
}
