<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function reportType() {
        $desc = 'Sexual Content';

        if ($this->reason == 'HA') {
            $desc = 'Harrassment and Threats';
        }
        else if ($this->reason == 'SP') {
            $desc = 'Spam or Misleading Content';
        }

        return ($desc);
    }

    public function post() {
        return $this->belongsTo(Post::class);
    }
}
