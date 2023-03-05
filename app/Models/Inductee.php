<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function nominatable(): MorphTo
    {
        return $this->morphTo();
    }

    public function relative()
    {
        return $this->hasOne(Relative::class, 'nominee_id');
    }

    public function scopeExist(Builder $query, Nominee $nominee): void {
        $query->where([
            'first_name' => $nominee->first_name,
            'last_name' => $nominee->last_name,
            ])->where(function (Builder $query) use ($nominee) {
                $query->where('birthday', $nominee->birthday)->orWhereNull('birthday');
            });
        }

    public static function doesntExist(Nominee $nominee) {
        return (bool) ! self::exist($nominee)->first();
    }
    }
