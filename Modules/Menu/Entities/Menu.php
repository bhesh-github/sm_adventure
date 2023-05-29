<?php

namespace Modules\Menu\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $guarded = [];
    
    function page(){
        return $this->hasOne(Page::class,'id','page_id');
    }
    
    function subMenus(){
        return $this->hasMany(Menu::class,'parent_id','id');
    }
    
    protected static function newFactory()
    {
        return \Modules\Menu\Database\factories\MenuFactory::new();
    }
}
