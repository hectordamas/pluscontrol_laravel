<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Timer;

class Weekday extends Model
{
    use HasFactory;

    public function timer(){
        return $this->belongsToMany(Timer::class, 'timer_weekday');
    }
}
