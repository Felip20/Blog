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

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $fro=Category::create([
            'name'=>'frontend',
            'slug'=>'frontend',
        ]);

        $bac=Category::create([
            'name'=>'backend',
            'slug'=>'backend',
        ]);

        Blog::create([
            'title'=>'Testing 1',
            'slug'=>'frontend-post',
            'intro'=>'this is testing 1',
            'body'=>'this is the testing 1 body',
            'category_id'=>$fro->id
        ]);

        Blog::create([
            'title'=>'Testing 2',
            'slug'=>'backend-post',
            'intro'=>'this is testing 2',
            'body'=>'this is the testing 2 body',
            'category_id'=>$bac->id
        ]);

    }
}
