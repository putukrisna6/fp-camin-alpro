<?php

namespace App\Models;

use App\Utilities\FilterBuilder;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot() {
        parent::boot();

        static::created(
            function($user) {
                $user->profile()->create([
                    'profession' => $user->username,
                    'gender' => 'Others',
                ]);
            }
        );
    }

    public function scopeFilterBy($query, $filters) {
        $namespace = 'App\Utilities\UserFilters';
        $filter = new FilterBuilder($query, $filters, $namespace);

        return $filter->apply();
    }

    public function userName() {
        return ($this->id != Auth::user()->id) ? $this->name : 'You';
    }

    public function profile() {
        return $this->hasOne(Profile::class);
    }

    public function groups() {
        return $this->belongsToMany(Group::class);
    }

    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function replies() {
        return $this->hasMany(Reply::class);
    }

    public function events() {
        return $this->hasMany(Event::class);
    }
}
