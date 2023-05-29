<?php

namespace Modules\Menu\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Menu\Entities\Menu;
use Modules\Menu\Entities\Page;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $menus = Menu::where('parent_id',Null)->latest()->with('page')->get();
        return view('menu::menu.index',compact("menus"));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $pages = Page::where('status','on')->latest()->get();
        $menus = Menu::where('parent_id',Null)->where('status','on')->latest()->get();
        return view('menu::menu.create',compact("menus","pages"));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        // dd($request->all());
        if($request->parent){
            $request->validate([
                'name' => 'required|unique:menus,name',
                'page' => 'required',
            ]);
            $menu = new menu();
            $menu->name = $request->name;
            $menu->page_id = $request->page;
            $menu->parent_id = $request->parent;
            if($request->status){
                $menu->status = 'on';
            }
            else{
                $menu->status = 'off';
            }
            
            $menu->save();
        }
        else{
            $request->validate([
                'name' => 'required|unique:menus,name',
                'page' => 'nullable'
            ]);
            $menu = new menu();
            $menu->name = $request->name;
            $menu->page_id = $request->page;
            $menu->parent_id = $request->parent;
            if($request->status){
                $menu->status = 'on';
            }
            else{
                $menu->status = 'off';
            }
            
            $menu->save();
        }
        
        return redirect()->route('menu.index')->with('success','Created Successfully.');
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
        $pages = Page::where('status','on')->latest()->get();
        $menus = Menu::where('parent_id',Null)->where('status','on')->latest()->get();
        $menu = Menu::findorfail($id);
        
        return view('menu::menu.edit',compact("pages","menus","menu"));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        if($request->parent){
            $request->validate([
                'name' => 'required|unique:menus,name,'.$id,
                'page' => 'required',
            ]);
            $menu = menu::findorfail($id);
            $menu->name = $request->name;
            $menu->page_id = $request->page;
            $menu->parent_id = $request->parent;
            if($request->status){
                $menu->status = 'on';
            }
            else{
                $menu->status = 'off';
            }
            
            $menu->update();
        }
        else{
            $request->validate([
                'name' => 'required|unique:menus,name,'.$id,
                'page' => 'nullable'
            ]);
            $menu = menu::findorfail($id);
            $menu->name = $request->name;
            $menu->page_id = $request->page;
            $menu->parent_id = $request->parent;
            if($request->status){
                $menu->status = 'on';
            }
            else{
                $menu->status = 'off';
            }
            
            $menu->update();
        }
        
        return redirect()->route('menu.index')->with('success','Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        // abort_if(Gate::denies('delete_blogs'), 403);
        $menu = Menu::findOrfail($id);
        $menu->delete();
        return redirect()->route('menu.index')->with('success', 'Deleted Successfully');
    }
    
    public function status($id)
    {
        // abort_if(Gate::denies('access_blogs'), 403);
        $menu = Menu::findOrfail($id);
        if($menu->status == 'on')
        {
            $status = 'off';
        }else{
            $status = 'on';
        }
        $menu->update([
           'status' => $status 
        ]);
        return redirect()->route('menu.index')->with('success', 'Status Updated Successfully');
    } 
}
