<?php

namespace Modules\Vacancy\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vacancy extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $guarded = [];
    protected $appends = ['image_link'];

    public function getimageLinkAttribute()
    {
       return asset("upload/images/vacancies/".$this->image);
    }

    protected static function newFactory()
    {
        return \Modules\Vacancy\Database\factories\VacancyFactory::new();
    }
}
