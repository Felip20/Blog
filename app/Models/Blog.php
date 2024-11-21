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
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
