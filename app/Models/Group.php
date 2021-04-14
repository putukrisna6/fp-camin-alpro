<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Group extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function boot() {
        parent::boot();

        static::created(
            function($group) {
                $group->users()->attach(Auth::user());
            }
        );
    }

    public function users() {
        return $this->belongsToMany(User::class);
    }
}
