<?php

namespace App\Models;

use Parental\HasParent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Administrator extends User
{
    use HasFactory;
    use HasParent;

    public function nominees(): MorphMany
    {
        return $this->morphMany(Nominee::class, 'nominatable');
    }
}
