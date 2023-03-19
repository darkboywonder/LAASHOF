<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Parental\HasParent;

class Nominator extends User
{
    use HasFactory;
    use HasParent;

    public function nominees(): MorphMany
    {
        return $this->morphMany(Nominee::class, 'nominatable');
    }
}
