<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Esp;
use App\Models\Weekday;

class Timer extends Model
{
    use HasFactory;

    public function esp(){
        return $this->belongsTo(Esp::class);
    }

    public function weekdays(){
        return $this->belongsToMany(Weekday::class, 'timer_weekday');
    }
}
