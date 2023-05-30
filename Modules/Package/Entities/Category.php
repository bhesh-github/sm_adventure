<?php

namespace Modules\Package\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $guarded = [];

    function category(){
        return $this->belongsTo(Category::class,'parent_id','id');
    }

    function subcategories(){
        return $this->hasMany(Category::class,'parent_id','id');
    }

    function packages(){
        return $this->hasMany(Package::class,'category_id','id');
    }
    
    protected static function newFactory()
    {
        return \Modules\Package\Database\factories\CategoryFactory::new();
    }
}
