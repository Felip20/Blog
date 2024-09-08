<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('blogs');
});

Route:: get('/blogs/{blog}', function ($xfile) {
    $path=__DIR__. "/../resources/blogs/$xfile.html";
    if (!file_exists($path)) {
        return redirect('/');
    }
    $blog=file_get_contents($path);
    return view('blog', [
        'blog'=> $blog
    ]);
});
