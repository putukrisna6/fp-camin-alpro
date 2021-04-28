<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function profileImage() {
        $default = '/img/undraw_rocket.svg';

        if ($this->gender == 'Male') {
            $default = '/img/undraw_profile.svg';
        }
        else if ($this->gender == 'Female') {
            $default = '/img/undraw_profile_1.svg';
        }

        return ($this->image) ? '/storage/' . $this->image : $default;
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
