<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medical extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $appends = [
        'value', 'created_at', 'updated_at'
    ];

    // menampilkan isi pada attr value
    public function getValueAttribute()
    {
        $type = $this->attributes['type']; // untuk ambil attr/column type
        $medical_id = $this->attributes['id']; // untuk ambil attr/column id
        if($type == 'BLOODPRESSURE') {
            // SELECT systole, disatole WHERE medical_id = $medical_id;
            $bloods = BloodPressure::select('systole', 'disatole')->where('medical_id', $medical_id)->first();
            return $bloods;
        } else if($type == 'SLEEP') {
            // SELECT sleepStart, sleepEnd, deepSleep, lightSleep, wakeTime WHERE medical_id = $medical_id;
            $sleeps = Sleep::select('sleepStart', 'sleepEnd', 'deepSleep', 'lightSleep', 'wakeTime')->where('medical_id', $medical_id)->first();
            return $sleeps;
        } else {
            return  $this->attributes['value'];
        }
    }

    public function getCreatedAtAttribute()
    {
        return strtotime($this->attributes['created_at']);
    }

    public function getUpdatedAtAttribute()
    {
        return strtotime($this->attributes['updated_at']);
    }
}
