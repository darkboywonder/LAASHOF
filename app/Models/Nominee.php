<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nominee extends Model
{
    use HasFactory;

    protected $casts = [
        'achievements' => 'array',
    ];

    public function nominator()
    {
        return $this->belongsTo(Nominator::class);
    }
}
