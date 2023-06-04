<?php

namespace Modules\Package\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $guarded = [];
    protected $appends = ['image_link'];

    function category(){
        return $this->belongsTo(Category::class,'parent_id','id');
    }

    function subcategories(){
        return $this->hasMany(Category::class,'parent_id','id');
    }

    function packages(){
        return $this->hasMany(Package::class,'category_id','id');
    }

    public function getImageLinkAttribute()
    {
       return asset("upload/images/category/".$this->image);
    }
    
    protected static function newFactory()
    {
        return \Modules\Package\Database\factories\CategoryFactory::new();
    }
}