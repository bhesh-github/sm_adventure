<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Blog\Entities\Blog;

class BlogController extends Controller
{
    public function blog()
    {
        $blogs = Blog::where('status','on')->latest()->get();

        return response()->json($blogs);
    }

    public function blogDetails($slug)
    {
        $blog = Blog::where('slug',$slug)->first();

        return response()->json($blog);
    }

    public function recentBlogs()
    {
        $blogs = Blog::where('status','on')->latest()->take(4)->get();

        return response()->json($blogs);
    }
}
