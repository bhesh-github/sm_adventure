<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Faq\Entities\Faq;

class FaqController extends Controller
{
    public function faq()
    {
        $faqs = Faq::where('status','on')->get();

        return response()->json($faqs);
    }
}
