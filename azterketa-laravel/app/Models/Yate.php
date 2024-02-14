<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Yate extends Model
{
    use HasFactory;

    public function alokairua(){
        return $this->hasMany(Alokairua::class);
    }
}
