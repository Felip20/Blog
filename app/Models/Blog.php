<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $with=['category', 'author'];

    public function scopeFilter($query,$filter)
    {
        $query->when($filter['search']??false,function($query,$ser){
            $query->where(function($query) use($ser){
                $query->where('title','LIKE','%'.$ser.'%')
                    ->orWhere('body','LIKE','%'.$ser.'%');
            });
        });
        $query->when($filter['category']??false,function($query,$slug){
            $query->whereHas('category',function($query) use($slug){
                $query->where('slug',$slug);
            });
        });
        $query->when($filter['username']??false,function($query,$username){
            $query->whereHas('author', function($query) use($username){
                $query->where('username',$username);
            });
        });

    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function subscribers()
    {
        return $this->belongsToMany(User::class);
    }

    public function unSubscribe()
    {
        $this->subscribers()->detach(auth()->id());
    }

    public function Subscribe()
    {
        $this->subscribers()->attach(auth()->id());
    }
}
