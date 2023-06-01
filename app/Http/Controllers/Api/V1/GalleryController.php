<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Gallery\Entities\Gallery;
use Modules\Gallery\Entities\GalleryImages;

class GalleryController extends Controller
{
    public function gallery()
    {
        $gallery = Gallery::where('status','on')->latest()->get();

        return response()->json($gallery);
    }

    public function galleryImages($slug)
    {
        $images = GalleryImages::where('status','on')
        ->whereHas('gallery', function($q) use($slug){
            $q->where('status','on')->where('slug',$slug);
        })
        ->with('gallery')
        ->latest()
        ->get();

        return response()->json($images);
    }
}
