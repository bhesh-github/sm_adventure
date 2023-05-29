<?php

namespace Modules\Package\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PackageItinerary extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $guarded = [];
    
    protected static function newFactory()
    {
        return \Modules\Package\Database\factories\PackageItineraryFactory::new();
    }
}
