<?php

namespace Modules\Package\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PackageExpectation extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $guarded = [];
    protected $appends = ['image_link'];

    public function getImageLinkAttribute()
    {
       return asset("upload/images/expectation/".$this->image);
    }
    
    protected static function newFactory()
    {
        return \Modules\Package\Database\factories\PackageExpectationFactory::new();
    }
}
