<?php

namespace Modules\Package\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\Package\Entities\Package;
use Modules\Package\Entities\PackageItinerary;

class PackageItineraryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($id)
    {
        abort_if(Gate::denies('show_packages'), 403);
        $package = Package::findorfail($id);
        $itinerary = PackageItinerary::where('package_id',$id)->orderby('day','ASC')->get();

        return view('package::itinerary.index',compact("package","itinerary"));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create($id)
    {
        abort_if(Gate::denies('create_packages'), 403);
        $package = Package::findorfail($id);
        return view('package::itinerary.create',compact("package"));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        foreach($request->day as $key => $day){
            PackageItinerary::create([
                'package_id' => $request->package,
                'day' => $day,
                'title' => $request->title[$key],
                'description' => $request->description[$key],
            ]);
        }

        return redirect()->route('itinerary.index',$request->package)->with('success','Added Successfully.');
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
        abort_if(Gate::denies('edit_packages'), 403);
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
        $itinerary = PackageItinerary::findorfail($id);

        $itinerary->update([
            'day' => $request->day,
            'title' => $request->title,
            'description' => $request->description,
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
        $itinerary = PackageItinerary::findOrfail($id);
        $itinerary->delete();
        return redirect()->route('itinerary.index',$itinerary->package_id)->with('success', 'Deleted Successfully');
    }
}
