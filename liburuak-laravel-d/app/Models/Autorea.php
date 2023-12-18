<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autorea extends Model
{
    use HasFactory;

    public function liburuak()
    {
        return $this->hasMany(Liburua::class);
    }

}
