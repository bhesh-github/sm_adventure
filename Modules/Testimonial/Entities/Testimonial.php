<?php

namespace Modules\Testimonial\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $guarded=[];
    protected $appends = ['image_link','thumbnail_link'];

    public function getimageLinkAttribute()
    {
       return asset("upload/images/testimonials/".$this->image);
    }

    public function getThumbnailLinkAttribute()
    {
       return asset("upload/images/testimonials/".$this->thumbnail);
    }

    protected static function newFactory()
    {
        return \Modules\Testimonial\Database\factories\TestimonialFactory::new();
    }
}
