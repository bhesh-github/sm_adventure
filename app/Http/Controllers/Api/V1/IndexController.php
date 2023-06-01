<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Company\Entities\Company;
use Modules\Menu\Entities\Menu;
use Modules\Package\Entities\Category;
use Modules\Package\Entities\Package;
use Modules\Slider\Entities\Slider;
use Modules\Testimonial\Entities\Testimonial;

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
        
        $packages = Package::where('status','on')
        ->whereHas('category', function($q) use($category){
            $q->where('status','on')->where('parent_id',$category->id);
        })
        ->with('category','images','itinerary','reviews')
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

    public function testimonials()
    {
        $testimonials = Testimonial::where('status', 'on')->get();

        return response()->json($testimonials);
    }

    public function companies()
    {
        $companies = Company::where('status', 'on')->get();

        return response()->json($companies);
    }

    public function footerCategories()
    {
        $cat = Category::where('name','Inbound Packages')->first();

        $categories = Category::where('status','on')->where('parent_id',$cat->id)
        ->whereHas('packages', function($q) {
            $q->where('status','on');
        })
        ->with('packages')
        ->latest()
        ->take(10)
        ->get();

        return response()->json($categories);
    }
}
