<?php

namespace Modules\Setting\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\Setting\Entities\CompanyProfile;

class CompanyProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        abort_if(Gate::denies('access_settings'), 403);
        $profile = CompanyProfile::first();

        return view('setting::company-profile.index',compact("profile"));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('setting::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('setting::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('setting::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        abort_if(Gate::denies('access_settings'), 403);
        $profile = CompanyProfile::findOrfail($id);
        $logo = '';
        if ($request->logo)
        {
            $filename=$request->logo->getClientOriginalName();
            $logo = time().$filename;

            $request->logo->move(public_path('upload/images/settings'), $logo);

        }
        else{
            $logo = $profile->logo;
        }

        $footer_logo = '';
        if ($request->footer_logo)
        {
            $filename=$request->footer_logo->getClientOriginalName();
            $footer_logo = time().$filename;

            $request->footer_logo->move(public_path('upload/images/settings'), $footer_logo);

        }
        else{
            $footer_logo = $profile->footer_logo;
        }

        $favicon = '';
        if ($request->favicon)
        {
            $filename=$request->favicon->getClientOriginalName();
            $favicon = time().$filename;

            $request->favicon->move(public_path('upload/images/settings'), $favicon);

        }
        else{
            $favicon = $profile->favicon;
        }

        $image = '';
        if ($request->image)
        {
            $filename=$request->image->getClientOriginalName();
            $image = time().$filename;

            $request->image->move(public_path('upload/images/settings'), $image);

        }
        else{
            $image = $profile->image;
        }

        $profile->update([
            'company_name' => $request['company_name'],
            'company_phone' => $request['company_phone'],
            'company_phone_2' => $request['company_phone_2'],
            'company_email' => $request['company_email'],
            'company_address' => $request['company_address'],
            'logo' => $logo,
            'footer_logo' => $footer_logo,
            'favicon' => $favicon,
            'image' => $image,
            'introduction' => $request['introduction'],
            'mission' => $request['mission'],
            'vision' => $request['vision'],
            'footer_text' => $request['footer_text'],
            'map' => $request['map'],
            'facebook' => $request['facebook'],
            'instagram' => $request['instagram'],
            'twitter' => $request['twitter'],
            'youtube' => $request['youtube'],
            'meta_title' => $request['meta_title'],
            'meta_description' => $request['meta_description'],
            'meta_keywords' => $request['meta_keywords']
        ]);
        
        return redirect()->route('company.index')->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
