<?php

namespace Modules\Gallery\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\Gallery\Entities\Gallery;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        abort_if(Gate::denies('show_gallery'), 403);
        $galleries = Gallery::latest()->get();

        return view('gallery::gallery.index',compact("galleries"));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        abort_if(Gate::denies('create_gallery'), 403);
        return view('gallery::gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:galleries,name',
        ]);
        $imageName = '';
        $slug = Str::slug($request->name);
        if ($request->image)
        {
            $filename=$request->image->getClientOriginalName();
            $imageName = time().$filename;

            $request->image->move(public_path('upload/images/gallery'), $imageName);

        }
        if($request->status){
            $status = $request->status;
        }
        else{
            $status = 'off';
        }
        Gallery::create([
            'name' => $request['name'],
            'slug'=> $slug,
            'status' => $status,
            'image' => $imageName
        ]);
        
        return redirect()->route('gallery.index')->with('success', 'Added Successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('gallery::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        abort_if(Gate::denies('edit_gallery'), 403);
        $gallery = Gallery::findorfail($id);

        return view('gallery::gallery.edit',compact("gallery"));
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
            'name' => 'required|unique:galleries,name,'.$id,
        ]);
        $gallery = Gallery::findorfail($id);
        $imageName = $gallery->image;
        $slug = Str::slug($request->name);
        if ($request->image)
        {
            $filename=$request->image->getClientOriginalName();
            $imageName = time().$filename;

            $request->image->move(public_path('upload/images/gallery'), $imageName);

        }
        if($request->status){
            $status = $request->status;
        }
        else{
            $status = 'off';
        }
        $gallery->update([
            'name' => $request['name'],
            'slug'=> $slug,
            'status' => $status,
            'image' => $imageName
        ]);
        
        return redirect()->route('gallery.index')->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('delete_gallery'), 403);
        $gallery = Gallery::findOrfail($id);
        $gallery->delete();
        return redirect()->route('gallery.index')->with('success', 'Deleted Successfully');
    }
    public function status($id)
    {
        abort_if(Gate::denies('access_gallery'), 403);
        $gallery = Gallery::findOrfail($id);
        if($gallery->status == 'on')
        {
            $status = 'off';
        }else{
            $status = 'on';
        }
        $gallery->update([
           'status' => $status 
        ]);
        return redirect()->route('gallery.index')->with('success', 'Status Updated Successfully');
    } 
}
