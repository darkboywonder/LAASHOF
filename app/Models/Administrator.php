<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Parental\HasParent;

class Administrator extends User
{
    use HasFactory;
    use HasParent;

    public function nominees()
    {
        return $this->hasMany(Nominee::class, 'nominator_id');
    }
}