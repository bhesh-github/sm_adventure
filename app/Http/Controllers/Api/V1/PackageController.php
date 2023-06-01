<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Package\Entities\Package;

class PackageController extends Controller
{
    public function package()
    {
        $packages = Package::where('status','on')->latest()->get();

        return response()->json($packages);
    }

    public function packageDetail($slug)
    {
        $package = Package::where('slug',$slug)->with('images','category','itinerary','reviews','expectations')->latest()->get();

        return response()->json($package);
    }
}
