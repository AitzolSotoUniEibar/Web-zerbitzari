<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kantua extends Model
{
    use HasFactory;

    public function dj(){
        return $this->belongsTo(Dj::class);
    }
}
