<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Setting\Entities\CompanyProfile;

class CompanyProfileController extends Controller
{
    public function profile()
    {
        $profle = CompanyProfile::first();

        return response()->json($profle);
    }
}
