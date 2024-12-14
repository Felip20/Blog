<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Blog $blog)
    {
        request()->validate([
            'text'=>'required | min:10'
        ]);
        $blog->comments()->create([
            'body'=>request('text'),
            'user_id'=>auth()->user()->id,
        ]);

        return back();
    }
}
