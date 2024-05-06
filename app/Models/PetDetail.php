<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class PetDetail extends Model
{
    use HasFactory,Sluggable,SoftDeletes;
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }


    function gallery()
    {
        return $this->hasMany(Gallery::class,'pet_id','id');
    }

    function petMaster()
    {
        return $this->belongsTo(PetMaster::class,'petmaster_id','id');
    }
}
