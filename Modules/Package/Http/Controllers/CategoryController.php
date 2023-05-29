<?php

namespace Modules\Package\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\Package\Entities\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $categories = Category::where('parent_id',Null)->get();

        return view('package::category.index',compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('package::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $slug = Str::slug($request->name);
        Category::create([
            'name' => $request->name,
            'slug' => $slug,
            'parent_id' => $request->parent,
        ]);

        return back()->with('success','Created Successfully.');
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
        $category = Category::findorfail($id);
        $slug = Str::slug($request->name);
        $category->update([
            'name' => $request->name,
            'slug' => $slug,
            'parent_id' => $request->parent,
        ]);

        return back()->with('success','Created Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('delete_packages'), 403);
        $category = Category::findOrfail($id);
        $category->delete();
        return redirect()->route('category.index')->with('success', 'Deleted Successfully');
    }
    public function status($id)
    {
        abort_if(Gate::denies('access_packages'), 403);
        $category = Category::findOrfail($id);
        if($category->status == 'on')
        {
            $status = 'off';
        }else{
            $status = 'on';
        }
        $category->update([
           'status' => $status 
        ]);
        return redirect()->route('category.index')->with('success', 'Status Updated Successfully');
    } 
}
