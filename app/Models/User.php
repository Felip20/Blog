<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function getNameAttribute($val)
    {
        return ucwords($val);
    }

    public function subBlogs()
    {
        return $this->belongsToMany(Blog::class);
    }

    public function isSub($blog)
    {
        return auth()->user()->subBlogs && auth()->user()->subBlogs->contains('id',$blog->id);
    }
}
