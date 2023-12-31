<?php

namespace Modules\Gallery\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $guarded = [];
    protected $appends = ['image_link'];

    function galleryImages(){
        return $this->hasMany(GalleryImages::class,'gallery_id','id');
    }

    public function getImageLinkAttribute()
    {
       return asset("upload/images/gallery/".$this->image);
    }
    
    protected static function newFactory()
    {
        return \Modules\Gallery\Database\factories\GalleryFactory::new();
    }
}
