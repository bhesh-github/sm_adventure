<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Menu\Entities\Menu;
use Modules\Package\Entities\Category;
use Modules\Package\Entities\Package;
use Modules\Slider\Entities\Slider;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function category()
    {
        $categories = Category::where('parent_id', NULL)->where('status', 'on')->with('subcategories')->get();

        return response()->json($categories);
    }

    public function menu()
    {
        $menus = Menu::where('parent_id', NULL)->where('status', 'on')
            ->with(['subMenus' => function ($q) {
                $q->where('status', 'on')->with('page');
            }])
            ->get();

        return response()->json($menus);
    }

    public function banner()
    {
        $banner = Slider::where('status', 'on')->latest()->first();

        return response()->json($banner);
    }

    public function inboundTour()
    {
        $category = Category::where('name','Inbound Packages')->first();
        
        $packages = Category::where('status','on')->where('parent_id',$category->id)
        ->with('packages', function($q){
            $q->where('status','on')->with('images','expectations','reviews');
        })
        ->latest()
        ->take(10)
        ->get();

        return response()->json($packages);
    }

    public function outboundTour()
    {
        $category = Category::where('name','Outbound Packages')->with('subcategories')->first();

        return response()->json($category);
    }
}
