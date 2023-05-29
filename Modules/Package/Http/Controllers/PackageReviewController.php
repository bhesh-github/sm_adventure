<?php

namespace Modules\Package\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\Package\Entities\Package;
use Modules\Package\Entities\PackageReview;

class PackageReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($id)
    {
        abort_if(Gate::denies('show_packages'), 403);
        $package = Package::findorfail($id);
        $reviews = PackageReview::where('package_id',$id)->where('status','on')->get();

        return view('package::review.index',compact("package","reviews"));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create($id)
    {
        abort_if(Gate::denies('create_packages'), 403);
        $package = Package::findorfail($id);

        return view('package::review.create',compact("package"));
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

            $request->image->move(public_path('upload/images/review'), $imageName);
        }
        PackageReview::create([
            'package_id' => $request->package,
            'name' => $request->name,
            'image' => $imageName,
            'rating' => $request->rating,
            'title' => $request->title,
            'description' => $request->description
        ]);

        return redirect()->route('review.index',$request->package)->with('success','Added Successfully.');
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
        $review = PackageReview::findorfail($id);
        $imageName = $review->image;
        if ($request->image) {
            $filename = $request->image->getClientOriginalName();
            $imageName = time().$filename;

            $request->image->move(public_path('upload/images/review'), $imageName);
        }
        $review->update([
            'name' => $request->name,
            'image' => $imageName,
            'rating' => $request->rating,
            'title' => $request->title,
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
        $review = PackageReview::findOrfail($id);
        $review->delete();
        return back()->with('success', 'Deleted Successfully');
    }
}
