<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inductee extends Model
{
    use HasFactory;

    protected $casts = [
        'school_names' => 'array',
        'organization_names' => 'array',
        'league_types' => 'array',
        'birthday' => 'date',
    ];

    public function nominator()
    {
        return $this->belongsTo(Nominator::class);
    }

    public function relative()
    {
        return $this->hasOne(Relative::class);
    }
}
