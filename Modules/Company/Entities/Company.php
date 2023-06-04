<?php

namespace Modules\Company\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $guarded = [];
    protected $appends = ['image_link'];

    public function getImageLinkAttribute()
    {
       return asset("upload/images/company/".$this->image);
    }
    
    protected static function newFactory()
    {
        return \Modules\Company\Database\factories\CompanyFactory::new();
    }
}
