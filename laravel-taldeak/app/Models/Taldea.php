<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taldea extends Model
{
    use HasFactory;

    public function jokalariak(){
        return $this->hasMany(Jokalaria::class);
    }
}
