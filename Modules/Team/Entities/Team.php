<?php

namespace Modules\Team\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $guarded =[];
    protected $appends = ['image_link'];

    public function getimageLinkAttribute()
    {
       return asset("upload/images/teams/".$this->image);
    }

    protected static function newFactory()
    {
        return \Modules\Team\Database\factories\TeamFactory::new();
    }
}
