<?php

namespace App\Models;

use App\Utilities\FilterBuilder;
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

    public function groupType() {
        $type = 'border-bottom-info';

        if ($this->industry == 'Banking') {
            $type = 'border-bottom-warning';
        }
        else if ($this->industry == 'Healthcare') {
            $type = 'border-bottom-primary';
        }
        else if ($this->industry == 'Education') {
            $type = 'border-bottom-success';
        }

        return $type;
    }

    protected static function boot() {
        parent::boot();

        static::created(
            function($group) {
                $group->users()->attach(Auth::user());
            }
        );
    }

    public function scopeFilterBy($query, $filters) {
        $namespace = 'App\Utilities\GroupFilters';
        $filter = new FilterBuilder($query, $filters, $namespace);

        return $filter->apply();
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
