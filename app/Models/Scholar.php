<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scholar extends Model
{
    use HasFactory;

    protected $casts = [
        'birthday' => 'date',
        'graduation_date' => 'date',
        'semester_start_date' => 'date',
    ];


    public function guardian()
    {
        return $this->hasOne(Guardian::class);
    }

    public function documents()
    {
        return $this->hasMany(ScholarDocument::class);
    }
}
