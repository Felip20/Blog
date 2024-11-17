<?php

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('blogs',[
        'blogs'=>Blog::latest()->get(),
        'categories'=>Category::all()
    ]);
});

Route:: get('/blogs/{blog:slug}', function (Blog $blog) {
    return view('blog', [
        'blog'=> $blog,
        'randomBlogs'=>Blog::inRandomOrder()->take(3)->get()
    ]);
});

Route:: get('/categories/{category:slug}', function (Category $category) {
    return view('blogs',[
        'blogs'=>$category->blogs
    ]);
});

Route:: get('/users/{user:username}', function (User $user) {
    return view('blogs',[
        'blogs'=>$user->blogs
    ]);
});
