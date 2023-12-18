<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Liburua extends Model
{
    use HasFactory;

    public function autorea()
    {
        return $this->belongsTo(Author::class);
    }
}
