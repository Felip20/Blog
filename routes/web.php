<?php

use App\Models\Blog;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('blogs',[
        'blogs'=>Blog::all()
    ]);
});

Route:: get('/blogs/{blog}', function (Blog $blog) {
    return view('blog', [
        'blog'=> $blog
    ]);
});
