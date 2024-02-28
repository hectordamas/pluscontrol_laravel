<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Timer;
use App\Models\User;
use App\Models\EspLog;
use App\Models\PhoneToken;

class Esp extends Model
{
    use HasFactory;

    public function timers(){
        return $this->hasMany(Timer::class);
    }

    public function users(){
        return $this->belongsToMany(User::class, 'esp_user')
        ->withPivot(['role', 'main', 'alias']);
    }

    public function espLogs(){
        return $this->hasMany(EspLog::class);
    }

    public function phoneTokens(){
        return $this->hasMany(PhoneToken::class);
    }
    
}
