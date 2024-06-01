<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceProvider extends Model
{
    use HasFactory,SoftDeletes,Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function faqs()
    {
        return $this->hasMany(ServiceProviderFaq::class,'service_provider_id');
    }

    public function gallery(){
        return $this->hasMany(ServiceProviderGallery::class,'service_provider_id');
    }

    public function services() {
        return $this->belongsToMany(Category::class,ServiceProviderService::class,'service_provider_id','service_id')->withPivot('status');
    }
}
