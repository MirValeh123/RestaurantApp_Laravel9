<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    public function index() {
        $categories=Category::paginate(3);

        return view('management.category')->with('categories',$categories);       
    }
    public function create() {
        return view('management.createCategory');       
    }
    public function store(Request $request) {
        $request->validate([
            'name'=>'required|unique:categories|max:255'
        ]);
        $category=new Category;
        $category->name=$request->name;
        $category->save();
        $request->session()->flash('status',$request->name.' is save successfully!');
        return(redirect('/management/category/'));
    }
    public function edit($id)  {
        $category=Category::find($id);
        return view('management.editCategory')->with('category',$category);
    }
    public function update(Request $request, $id)  {
        $request->validate([
            'name'=>'required|unique:categories|max:255'
        ]);
        $category=Category::find($id);
        $category->name=$request->name;
        $category->save();
        $request->session()->flash('status',$request->name.' is updated successfully!');
        return(redirect('/management/category/'));
    }
    public function destroy(Request $request, $id) {
        $category=Category::destroy($id);
        $request->session()->flash('status',' deleted successfully!');
        return(redirect('/management/category/'));
    }
}
