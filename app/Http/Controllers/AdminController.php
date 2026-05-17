<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class AdminController extends Controller
{
    public function index(){

    return view('admin.pages.dashboard');
    }

    // ---------------------------------------users---------------------------------//

    public function usersForm(){

    $roles = Role::all();

    return view('admin.pages.users.form',compact('roles'));
    }

    public function usersStore(Request $request){
        $data = $request->validate([
            'name'=>'required|string|max:300',
            'username'=>'required|string|max:300',
            'email'=>'required|email',
            'phone'=>'required|string',
            'password'=>'required|string|max:20',
            'role_id'=>'required',

        ]);

        $users = new User();
        $users->name = $data['name'];
        $users->username = $data['username'];
        $users->email = $data['email'];
        $users->password = Hash::make($data['password']);
        $users->role_id = $data['role_id'];

        $users->save();

        Session::flash('success','users data has been saved');
        return redirect()->back();

    }

    // --------------------------------Roles-----------------------------------//

    public function rolesForm(){

    return view('admin.pages.roles.form');
    }

    public function rolesStore(Request $request){
        $data = $request->validate([
            'name'=>'required',

        ]);
        $roles = new Role();
        $roles->name = $data['name'];

        $roles->save();

        Session::flash('success','roles has been saved');
        return redirect()->back();
    }
}
