<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nominee extends Model
{
    use HasFactory;

    public function nominator()
    {
        return $this->belongsTo(Nominator::class);
    }

    public function relative()
    {
        return $this->hasOne(Relative::class);
    }
}
