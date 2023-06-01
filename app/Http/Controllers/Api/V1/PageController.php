<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Menu\Entities\Page;

class PageController extends Controller
{
    public function pageShow($slug)
    {
        $page = Page::where('slug', $slug)->first();

        return response()->json($page);
    }
}
