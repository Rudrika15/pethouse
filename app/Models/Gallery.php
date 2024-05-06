<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    function petDetail()
    {
        return $this->belongsTo(PetDetail::class, 'pet_id', 'id');
    }
}
