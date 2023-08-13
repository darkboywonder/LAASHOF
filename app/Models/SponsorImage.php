<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class SponsorImage extends Model
{
    use HasFactory;

    public function scopeVisible(Builder $query)
    {
        return $query->where('visible', true);
    }
}
