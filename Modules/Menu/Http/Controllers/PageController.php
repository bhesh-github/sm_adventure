<?php

namespace Modules\Menu\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Menu\Entities\Page;
use Illuminate\Support\Str;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $pages = Page::latest()->get();
        return view('menu::page.index',compact("pages"));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('menu::page.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:pages,title',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'content' => 'required',
        ]);
        $page = new Page();
        $page->title = $request->title;
        $page->slug = Str::slug($request->title);
        $page->content = $request->content;
        if($request->status){
            $page->status = 'on';
        }
        else{
            $page->status = 'off';
        }
        $imageName ="";
        if ($request->image)
        {
            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('upload/images/page'), $imageName);

        }
        $page->image = $imageName;
        $page->save();
        
        return redirect()->route('page.index')->with('success','Created Successfully.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('menu::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $page = Page::findorfail($id);
        
        return view('menu::page.edit',compact("page"));
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
            'title' => 'required|unique:pages,title,'.$id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'content' => 'required',
        ]);
        $page = Page::findorfail($id);
        $page->title = $request->title;
        $page->slug = Str::slug($request->title);
        $page->content = $request->content;
        if($request->status){
            $page->status = 'on';
        }
        else{
            $page->status = 'off';
        }
        $imageName =$page->image;
        if ($request->image)
        {
            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('upload/images/page'), $imageName);

        }
        $page->image = $imageName;
        $page->update();
        
        return redirect()->route('page.index')->with('success','Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        // abort_if(Gate::denies('delete_blogs'), 403);
        $page = Page::findOrfail($id);
        $page->delete();
        return redirect()->route('page.index')->with('success', 'Deleted Successfully');
    }
    
    public function status($id)
    {
        // abort_if(Gate::denies('access_blogs'), 403);
        $page = Page::findOrfail($id);
        if($page->status == 'on')
        {
            $status = 'off';
        }else{
            $status = 'on';
        }
        $page->update([
           'status' => $status 
        ]);
        return redirect()->route('page.index')->with('success', 'Status Updated Successfully');
    } 
}
