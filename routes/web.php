<?php

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('blogs',[
        'blogs'=>Blog::with('category')->get()
    ]);
});

Route:: get('/blogs/{blog:slug}', function (Blog $blog) {
    return view('blog', [
        'blog'=> $blog
    ]);
});

Route:: get('/categories/{category:slug}', function (Category $category) {
    return view('blogs',[
        'blogs'=>$category->blogs
    ]);
});
