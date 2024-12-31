<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    public function store(Blog $blog)
    {
        request()->validate([
            'text'=>'required | min:10'
        ]);
        dd();
        $blog->comments()->create([
            'body'=>request('text'),
            'user_id'=>auth()->user()->id,
        ]);
        $subscribers=$blog->subscribers->filter(fn($subscriber)=> $subscriber->id != auth()->id());

        // $subscribers->each(function($subscriber)
        // {
        //     Mail::to($subscriber->email)->send();
        // });

        return redirect('/blogs/'.$blog->slug);
    }
}
