<?php

namespace Modules\Package\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\Package\Entities\Package;
use Illuminate\Support\Str;
use Modules\Package\Entities\Category;
use Modules\Package\Entities\PackageImage;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        abort_if(Gate::denies('show_packages'), 403);
        $packages = Package::latest()->get();

        return view('package::package.index', compact("packages"));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        abort_if(Gate::denies('create_packages'), 403);
        $categories = Category::where('status','on')->where('parent_id',Null)->get();

        return view('package::package.create',compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        abort_if(Gate::denies('create_packages'), 403);
        $request->validate([
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'category' => 'required'
        ]);

        $thumbnailName = '';
        $slug = Str::slug($request->name);
        if ($request->thumbnail) {
            $filename = $request->thumbnail->getClientOriginalName();
            $thumbnailName = time().$filename;

            $request->thumbnail->move(public_path('upload/images/package'), $thumbnailName);
        }
        if ($request->status) {
            $status = $request->status;
        } else {
            $status = 'off';
        }
        $package = Package::create([
            'name' => $request['name'],
            'slug' => $slug,
            'category_id' => $request->category,
            'thumbnail' => $thumbnailName,
            'video' => $request['video'],
            'map' => $request['map'],
            'duration' => $request['duration'],
            'adult_price' => $request['adult_price'],
            'children_price' => $request['children_price'],
            'infant_price' => $request['infant_price'],
            'description' => $request['description'],
            'included_excluded' => $request['included_excluded'],
            'meta_title' => $request['meta_title'],
            'meta_keywords' => $request['meta_keywords'],
            'meta_description' => $request['meta_description'],
            'status' => $status
        ]);

        if ($request->images) {
            foreach ($request->images as $image) {
                $filename = $image->getClientOriginalName();
                $imageName = time() . $filename;

                $image->move(public_path('upload/images/package'), $imageName);

                PackageImage::create([
                    'package_id' => $package->id,
                    'image' => $imageName
                ]);
            }
        }

        return redirect()->route('packages.index')->with('success', 'Created Successfully');
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
        $package = Package::findorfail($id);
        $categories = Category::where('status','on')->where('parent_id',Null)->get();

        return view('package::package.edit',compact("package","categories"));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp'
        ]);

        $package = Package::findorfail($id);
        $thumbnailName = $package->thumbnail;
        $slug = Str::slug($request->name);
        if ($request->thumbnail) {
            $filename = $request->thumbnail->getClientOriginalName();
            $thumbnailName = time().$filename;

            $request->thumbnail->move(public_path('upload/images/package'), $thumbnailName);
        }
        if ($request->status) {
            $status = $request->status;
        } else {
            $status = 'off';
        }
        $package->update([
            'name' => $request['name'],
            'slug' => $slug,
            'category_id' => $request->category,
            'thumbnail' => $thumbnailName,
            'video' => $request['video'],
            'map' => $request['map'],
            'duration' => $request['duration'],
            'adult_price' => $request['adult_price'],
            'children_price' => $request['children_price'],
            'infant_price' => $request['infant_price'],
            'description' => $request['description'],
            'included_excluded' => $request['included_excluded'],
            'meta_title' => $request['meta_title'],
            'meta_keywords' => $request['meta_keywords'],
            'meta_description' => $request['meta_description'],
            'status' => $status
        ]);

        if ($request->images) {
            foreach ($request->images as $image) {
                $filename = $image->getClientOriginalName();
                $imageName = time() . $filename;

                $image->move(public_path('upload/images/package'), $imageName);

                PackageImage::create([
                    'package_id' => $package->id,
                    'image' => $imageName
                ]);
            }
        }

        return redirect()->route('packages.index')->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('delete_packages'), 403);
        $package = Package::findOrfail($id);
        $package->delete();
        return redirect()->route('packages.index')->with('success', 'Deleted Successfully');
    }
    public function status($id)
    {
        abort_if(Gate::denies('access_packages'), 403);
        $package = Package::findOrfail($id);
        if($package->status == 'on')
        {
            $status = 'off';
        }else{
            $status = 'on';
        }
        $package->update([
           'status' => $status 
        ]);
        return redirect()->route('packages.index')->with('success', 'Status Updated Successfully');
    }

    public function imageDelete($id)
    {
        abort_if(Gate::denies('delete_packages'), 403);
        $package = PackageImage::findOrfail($id);
        $package->delete();
        return back()->with('success', 'Removed Successfully');
    }
}
