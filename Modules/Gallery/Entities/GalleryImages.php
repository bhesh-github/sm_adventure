<?php

namespace Modules\Gallery\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GalleryImages extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $guarded = [];
    protected $appends = ['image_link'];

    function gallery(){
        return $this->belongsTo(Gallery::class);
    }

    public function getImageLinkAttribute()
    {
       return asset("upload/images/category/".$this->image);
    }
    
    protected static function newFactory()
    {
        return \Modules\Gallery\Database\factories\GalleryImagesFactory::new();
    }
}
