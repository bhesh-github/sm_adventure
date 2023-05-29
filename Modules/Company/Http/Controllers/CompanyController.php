<?php

namespace Modules\Company\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\Company\Entities\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        abort_if(Gate::denies('show_company'), 403);
        $company = Company::latest()->get();

        return view('company::company.index',compact("company"));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        abort_if(Gate::denies('create_company'), 403);
        return view('company::company.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $imageName = '';
        if ($request->image)
        {
            $filename=$request->image->getClientOriginalName();
            $imageName = time().$filename;

            $request->image->move(public_path('upload/images/company'), $imageName);

        }
        if($request->status){
            $status = $request->status;
        }
        else{
            $status = 'off';
        }

        Company::create([
            'name' => $request->name,
            'image' => $imageName,
            'status' => $status,
        ]);

        return redirect()->route('companies.index')->with('success','Created Successfully.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('company::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        abort_if(Gate::denies('edit_company'), 403);
        $company = Company::findorfail($id);

        return view('company::company.edit',compact("company"));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $company = Company::findorfail($id);
        $imageName = $company->image;
        if ($request->image)
        {
            $filename=$request->image->getClientOriginalName();
            $imageName = time().$filename;

            $request->image->move(public_path('upload/images/company'), $imageName);

        }
        if($request->status){
            $status = $request->status;
        }
        else{
            $status = 'off';
        }

        $company->update([
            'name' => $request->name,
            'image' => $imageName,
            'status' => $status,
        ]);

        return redirect()->route('companies.index')->with('success','Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('delete_company'), 403);
        $company = Company::findOrfail($id);
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Deleted Successfully');
    }
    public function status($id)
    {
        abort_if(Gate::denies('access_company'), 403);
        $company = Company::findOrfail($id);
        if($company->status == 'on')
        {
            $status = 'off';
        }else{
            $status = 'on';
        }
        $company->update([
           'status' => $status 
        ]);
        return redirect()->route('companies.index')->with('success', 'Status Updated Successfully');
    } 
}
