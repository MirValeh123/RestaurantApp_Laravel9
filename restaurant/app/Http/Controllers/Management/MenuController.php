<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus=Menu::paginate(4);
        return view('management.menu')->with('menus',$menus);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        return view('management.createMenu')->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:menus|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|numeric'
        ]);
        $imageName='noimage.png';
        if ($request->image) {
            $request->validate([
                'image'=>'nullable|file|image|mimes:jpeg,png,jpg,webp|max:5000'
            ]);
            $imageName=date('mdYHis').uniqid().'.'.$request->image->extension();
            $request->image->move(public_path('menu_images'),$imageName);
        }
        $menu=new Menu;
        $menu->name=$request->name;
        $menu->price=$request->price;
        $menu->image=$imageName;
        $menu->description=$request->description;
        $menu->category_id=$request->category_id;
        $menu->save();
        $request->session()->flash('status',$request->name.' is saved successfully!');
        return redirect('/management/menu');
    }

    /**
     * Display the specified resource.
     */
   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $menu=Menu::find($id);
        $categories=Category::all();
        return view('management.updateMenu')->with('menu',$menu)->with('categories',$categories);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|numeric'
        ]);
        $menu=Menu::find($id);
        if ($request->image) {
            $request->validate([
                'image'=>'nullable|file|image|mimes:jpeg,png,jpg,webp|max:5000'
            ]);
            if ($menu->image != 'noimage.png') {
                $imageName=$menu->image;
                unlink(public_path('menu_images').'/'.$imageName);
            }
            $imageName=date('mdYHis').uniqid().'.'.$request->image->extension();
            $request->image->move(public_path('menu_images'),$imageName);
           
        }
        else{
            $imageName=$menu->image;
        }
        $menu->name=$request->name;
        $menu->price=$request->price;
        $menu->image=$imageName;
        $menu->description=$request->description;
        $menu->category_id=$request->category_id;
        $menu->save();
        $request->session()->flash('status',$request->name.' is updated successfully!');
        return redirect('/management/menu');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $menu=Menu::find($id);
        if ($menu->image != 'noimage.png') {
            unlink(public_path('menu_images'.'/'.$menu->image));
        }
        $menu->delete();
        Session()->flash('status', 'Deleted successfully!');
        return redirect('/management/menu');
    }
}
