<?php

namespace Modules\Package\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $guarded = [];
    protected $appends = ['image_link'];

    function category(){
        return $this->belongsTo(Category::class);
    }

    function images(){
        return $this->hasMany(PackageImage::class,'package_id','id');
    }

    function itinerary(){
        return $this->hasMany(PackageItinerary::class,'package_id','id');
    }

    function reviews(){
        return $this->hasMany(PackageReview::class,'package_id','id');
    }

    function expectations(){
        return $this->hasMany(PackageExpectation::class,'package_id','id');
    }

    public function getImageLinkAttribute()
    {
       return asset("upload/images/package/".$this->thumbnail);
    }
    
    protected static function newFactory()
    {
        return \Modules\Package\Database\factories\PackageFactory::new();
    }
}
