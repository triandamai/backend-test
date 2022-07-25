<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BloodPressure;
use App\Models\Sleep;

class MedicalRecord extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $appends = ['value', 'created_at', 'updated_at'];

    public function getValueAttribute()
    {
        $type       = $this->attributes['type'];
        $medical_id = $this->attributes['id'];  
        if($type == 'BLOODPRESSURE') {
            $bloods = BloodPressure::select('systole', 'disatole')->where('medical_id', $medical_id)->first();
            return $bloods;
        } else if($type == 'SLEEP') {
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
