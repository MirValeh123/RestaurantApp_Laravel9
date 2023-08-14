<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Table;
class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $table=Table::paginate(3);
        return view('management.table')->with('tables',$table);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('management.createTable');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:tables|max:255'
        ]);
        $table=new Table;
        $table->name=$request->name;
        $table->status=$request->status;
        $table->save();
        $request->session()->flash('status',$request->name.' is saved successfully!');
        return redirect('/management/table');
    }

    /**
     * Display the specified resource.
     */
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $table=Table::find($id);
        return view('management.updateTable')->with('table',$table);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $request->validate([
        //     'name'=>'required|unique:tables|max:255'
        // ]);
        $table=Table::find($id);
        $table->name=$request->name;
        $table->status=$request->status;
        $table->save();
        $request->session()->flash('status',$request->name.' is updated successfully!');
        return redirect('/management/table');

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Table::destroy($id);
        return redirect('/management/table');

    }
}
