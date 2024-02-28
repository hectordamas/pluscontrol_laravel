<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Esp;

class EspLog extends Model
{
    use HasFactory;

    public function esp(){
        return $this->belongsTo(Esp::class);
    }
}
