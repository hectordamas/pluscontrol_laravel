<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Esp;

class PhoneToken extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function esp(){
        return $this->belongsTo(Esp::class);
    }
}
