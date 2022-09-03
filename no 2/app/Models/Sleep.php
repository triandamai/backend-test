<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sleep extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $appends = [
        'sleepStart', 'sleepEnd'
    ];

    public function getSleepStartAttribute()
    {
        return strtotime($this->attributes['sleepStart']);
    }

    public function getSleepEndAttribute()
    {
        return strtotime($this->attributes['sleepEnd']);
    }
}
