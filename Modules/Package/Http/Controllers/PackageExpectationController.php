<?php

namespace Modules\Package\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\Package\Entities\Package;
use Modules\Package\Entities\PackageExpectation;

class PackageExpectationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($id)
    {
        abort_if(Gate::denies('show_packages'), 403);
        $package = Package::findorfail($id);
        $expects = PackageExpectation::where('package_id',$id)->get();

        return view('package::expectation.index',compact("package","expects"));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create($id)
    {
        abort_if(Gate::denies('create_packages'), 403);
        $package = Package::findorfail($id);

        return view('package::expectation.create',compact("package"));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $imageName = '';
        if ($request->image) {
            $filename = $request->image->getClientOriginalName();
            $imageName = time().$filename;

            $request->image->move(public_path('upload/images/expectation'), $imageName);
        }
        PackageExpectation::create([
            'package_id' => $request->package,
            'title' => $request->title,
            'image' => $imageName,
            'description' => $request->description
        ]);

        return redirect()->route('expectations.index',$request->package)->with('success','Added Successfully.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('package::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('package::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        abort_if(Gate::denies('edit_packages'), 403);
        $expectation = PackageExpectation::findorfail($id);
        $imageName = $expectation->image;
        if ($request->image) {
            $filename = $request->image->getClientOriginalName();
            $imageName = time().$filename;

            $request->image->move(public_path('upload/images/expectation'), $imageName);
        }
        $expectation->update([
            'title' => $request->title,
            'image' => $imageName,
            'description' => $request->description
        ]);

        return back()->with('success','Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('delete_packages'), 403);
        $expect = PackageExpectation::findOrfail($id);
        $expect->delete();
        return back()->with('success', 'Deleted Successfully');
    }
}
