<?php

use App\Models\Blog;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('blogs');
});

Route:: get('/blogs/{blog}', function ($xfile) {
    return view('blog', [
        'blog'=> Blog::find($xfile)
    ]);
});
