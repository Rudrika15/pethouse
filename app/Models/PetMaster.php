<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
class PetMaster extends Model
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

    public function parent()
    {
       return $this->belongsTo(PetMaster::class, 'parent_id');
    }
    function children()
    {
        return $this->hasMany(PetMaster::class, 'parent_id');
    }
}
