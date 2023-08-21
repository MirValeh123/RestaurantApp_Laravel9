<?php

namespace App\Http\Controllers\Management;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=User::all();
        return view('management.user')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users=User::all();

        return view('management.createUser')->with('users',$users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:menus|max:255',
            'role' => 'required|max:255',
            'password' => 'required|max:255',
            'email' => 'required|max:255'
        ]);
        $user=new User;
        $user->name=$request->name;
        $user->role=$request->role;
        $user->password=$request->password;
        $user->email=$request->email;
        $user->save();
        $request->session()->flash('status',$request->name.' is added successfully!');

        return redirect('/management/user');
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user=User::find($id);
        return view('management.editUser')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|unique:menus|max:255',
            'role' => 'required|max:255',
            'password' => 'required|max:255',
            'email' => 'required|max:255'
        ]);
        $user=User::find($id);
        $user->name=$request->name;
        $user->role=$request->role;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->save();
        $request->session()->flash('status',$request->name.' is updated successfully!');

        return redirect('/management/user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user=User::find($id);

        $user->delete();
        Session()->flash('status', 'Deleted successfully!');
        return redirect('/management/user');
    }
}
