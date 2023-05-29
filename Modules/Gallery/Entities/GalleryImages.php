<?php

namespace Modules\Gallery\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GalleryImages extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $guarded = [];

    function gallery(){
        return $this->belongsTo(Gallery::class);
    }
    
    protected static function newFactory()
    {
        return \Modules\Gallery\Database\factories\GalleryImagesFactory::new();
    }
}
