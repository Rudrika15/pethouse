<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
class Package extends Model
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

    public function keys()
    {
        return $this->belongsToMany(PackageKey::class, 'package_link_keys', 'package_id', 'key_id');
    }

    

    // public function keyid()
    // {
    //     return $this->hasMany(PackageLinkKey::class,'package_id');
    // }

}
