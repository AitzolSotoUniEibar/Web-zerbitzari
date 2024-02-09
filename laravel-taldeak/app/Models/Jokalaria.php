<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jokalaria extends Model
{
    use HasFactory;

    public function taldea(){
        return $this->belongsTo(Taldea::class);
    }
}
