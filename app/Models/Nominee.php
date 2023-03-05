<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Nominee extends Model
{
    use HasFactory;

    protected $casts = [
        'birthday' => 'date',
    ];

    public function nominator()
    {
        return $this->belongsTo(User::class, 'nominator_id', 'id');
    }

    public function relative()
    {
        return $this->hasOne(Relative::class);
    }

    public function nominatable(): MorphTo
    {
        return $this->morphTo();
    }
}
