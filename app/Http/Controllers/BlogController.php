<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('blogs.index',[
            'blogs'=>Blog::latest()
                        ->filter(request(['search','category','username']))
                        ->paginate(7)
                        ->withQueryString()
        ]);
    }

    public function show(Blog $blog)
    {
        return view('blogs.show', [
            'blog'=> $blog,
            'randomBlogs'=>Blog::inRandomOrder()->take(3)->get(),
            'categories'=>Category::all()
        ]);
    }

    public function subHandler(Blog $blog)
    {
        if (auth()->user()->issub($blog)) {
            $blog->unSubscribe();
        }else{
            $blog->Subscribe();
        }
        return redirect('/blogs/'.$blog->slug);
    }
}
