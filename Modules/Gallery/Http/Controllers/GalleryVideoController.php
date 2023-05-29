<?php

namespace Modules\Gallery\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\Gallery\Entities\GalleryVideo;

class GalleryVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    { 
        abort_if(Gate::denies('show_gallery'), 403);
        $videos = GalleryVideo::latest()->get();

        return view('gallery::videos.index',compact("videos"));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        abort_if(Gate::denies('create_gallery'), 403);
        return view('gallery::videos.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'code' => 'required',
            'link' => 'required',
        ]);

        $video = new GalleryVideo();
        $video->title = $request->title;
        $video->link = $request->link;
        $video->code = $request->code;
        if($request->main){
            $video->main = $request->main;
        }
        else{
            $video->main = "off";
        }
        if($request->status){
            $video->status = $request->status;
        }
        else{
            $video->status = "off";
        }

        $video->save();
        return redirect()->route('gallery.video.index')->with('success','Added successfully.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        // return view('gallery::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        abort_if(Gate::denies('edit_gallery'), 403);
        $video = GalleryVideo::findorfail($id);

        return view('gallery::videos.edit',compact("video"));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'code' => 'required',
            'link' => 'required',
        ]);

        $video = GalleryVideo::findorfail($id);
        $video->title = $request->title;
        $video->link = $request->link;
        $video->code = $request->code;
        if($request->main){
            $video->main = $request->main;
        }
        else{
            $video->main = "off";
        }
        if($request->status){
            $video->status = $request->status;
        }
        else{
            $video->status = "off";
        }

        $video->update();
        return redirect()->route('gallery.video.index')->with('success','Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($gallery, $id)
    {
        abort_if(Gate::denies('delete_gallery'), 403);
        $video = GalleryVideo::findOrfail($id);
        $video->delete();
        return back()->with('success', 'Deleted Successfully');
    }
    public function status($id)
    { 
        abort_if(Gate::denies('access_gallery'), 403);
        $video = GalleryVideo::findOrfail($id);
        if($video->status == 'on')
        {
            $status = 'off';
        }else{
            $status = 'on';
        }
        $video->update([
           'status' => $status 
        ]);
        return back()->with('success', 'Status Updated Successfully');
    } 

    public function main($id)
    { 
        abort_if(Gate::denies('access_gallery'), 403);
        $video = GalleryVideo::findOrfail($id);
        if($video->main == 'on')
        {
            $main = 'off';
        }else{
            $main = 'on';
        }
        $video->update([
           'main' => $main 
        ]);
        return back()->with('success', 'Main Video Updated Successfully');
    } 
}
