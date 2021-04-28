<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Group extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function groupImage() {
        return ($this->image) ? '/storage/' . $this->image : '/img/placeholder/placeholder-image-card.webp';
    }

    protected static function boot() {
        parent::boot();

        static::created(
            function($group) {
                $group->users()->attach(Auth::user());
            }
        );
    }

    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function users() {
        return $this->belongsToMany(User::class);
    }

    public function events() {
        return $this->hasMany(Event::class);
    }
}
