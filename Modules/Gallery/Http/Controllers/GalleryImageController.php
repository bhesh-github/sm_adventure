<?php

namespace Modules\Gallery\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\Gallery\Entities\Gallery;
use Modules\Gallery\Entities\GalleryImages;

class GalleryImageController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($id)
    {
        abort_if(Gate::denies('show_gallery'), 403);
        $gallery = Gallery::findorfail($id);
        $galleries = GalleryImages::where('gallery_id',$gallery->id)->latest()->get();

        return view('gallery::images.index',compact("gallery","galleries"));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('gallery::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request, $id)
    {
        abort_if(Gate::denies('create_gallery'), 403);
        if($request->hasFile('images')){
            $images = $request->images;
            foreach($images as $key => $image){
                $filename = time().$key.$image->getClientOriginalName();
                // $filename = $image->getClientOriginalName();
                $image->move('upload/images/gallery/',$filename);

                $gallery = new GalleryImages();
                $gallery->gallery_id = $id;
                $gallery->image = $filename;
                if($request->status){
                    $gallery->status = "on";
                }
                else{
                    $gallery->status = "off";
                }
                $gallery->save();
            }
        }
        return back()->with('success','Images has been uploaded to gallery');
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
        return view('gallery::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($gallery, $id)
    {
        abort_if(Gate::denies('delete_gallery'), 403);
        $gallery = GalleryImages::findOrfail($id);
        $gallery->delete();
        return back()->with('success', 'Deleted Successfully');
    }
    public function status($id)
    { 
        abort_if(Gate::denies('access_gallery'), 403);
        $gallery = GalleryImages::findOrfail($id);
        if($gallery->status == 'on')
        {
            $status = 'off';
        }else{
            $status = 'on';
        }
        $gallery->update([
           'status' => $status 
        ]);
        return back()->with('success', 'Status Updated Successfully');
    } 
}
