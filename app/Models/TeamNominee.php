<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamNominee extends Model
{
    use HasFactory;

    public function members()
    {
        return $this->hasMany(TeamMember::class);
    }

    public function nominator()
    {
        return $this->belongsTo(Nominator::class);
    }
}
