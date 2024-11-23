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
        $mgmg=User::factory()->create(['name'=>'mgmg','username'=>'mgmg']);
        $aungaung=User::factory()->create(['name'=>'aung','username'=>'aung']);
        $fro=Category::factory()->create(['name'=>'frontend','slug'=>'frontend']);
        $bac=Category::factory()->create(['name'=>'Backend','slug'=>'backend']);

        Blog::factory(2)->create(['category_id'=>$fro->id,'user_id'=>$mgmg->id]);
        Blog::factory(2)->create(['category_id'=>$bac->id,'user_id'=>$aungaung->id]);

    }
}
