<?php

namespace Modules\Setting\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanyProfile extends Model
{
    use HasFactory;

    protected $guarded=[];
    protected $fillable = [
        'company_name',
        'company_email',
        'company_phone',
        'company_phone_2',
        'company_address',
        'logo',
        'footer_logo',
        'favicon',
        'image',
        'footer_text',
        'introduction',
        'vision',
        'mission',
        'map',
        'facebook',
        'instagram',
        'twitter',
        'youtube',
        'meta_title',
        'meta_description',
        'meta_keywords'
    ];
    protected $appends = ['logo_link','footer_logo_link','favicon_link','image_link'];

    public function getLogoLinkAttribute()
    {
       return asset("upload/images/settings/".$this->image);
    }
    public function getFooterLogoLinkAttribute()
    {
       return asset("upload/images/settings/".$this->footer_logo);
    }
    public function getfaviconLinkAttribute()
    {
       return asset("upload/images/settings/".$this->favicon);
    }
    public function getimageLinkAttribute()
    {
       return asset("upload/images/settings/".$this->image);
    }
    
    protected static function newFactory()
    {
        return \Modules\Setting\Database\factories\CompanyProfileFactory::new();
    }
}
