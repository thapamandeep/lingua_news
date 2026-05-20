<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use App\Models\Category;
use App\Models\Subcategory;

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

    public function rolesIndex(){

    $roles = Role::all();
    
    return view('admin.pages.roles.rolesTable',compact('roles'));
    } 

    // --------------------------------------category-----------------------------//

    public function categoryForm(){

    return view('admin.pages.categories.form');
    }

    public function categoryStore(Request $request){
        $data = $request->validate([
            'name'=>'required|string|max:200',
            'slug'=>'required|string|max:200|unique:categories,slug',
            'status'=>'required|in:active,inactive',
            'description'=>'nullable|string',
        ]);

        $categories = new Category();
        $categories->name = $data['name'];
        $categories->slug = $data['slug'];
        $categories->status = $data['status'];
        $categories->description = $data['description'];

        $categories->save();

        Session::flash('success','category has been saved');
        return redirect()->back();
    }

    public function categoryIndex(){

    return view('admin.pages.categories.catTable');
    }

    // ------------------------------------------subcategories------------------------------------//

    public function subcategory(){

    $categories = Category::all();
    $subcategories = Subcategory::all();

    return view('admin.pages.subcategories.form',compact('categories','subcategories'));
    }

    public function subcategoryStore(Request $request){

    $data = $request->validate([
       'category_id' => 'required|exists:categories,id',
        'name' => 'required|string|max:255',
        'slug' => 'nullable|string|unique:subcategories,slug',
        'status' => 'required|boolean',
    ]);

    $subcategories = new Subcategory();
    $subcategories->name = $data['name'];
    $subcategories->category_id = $data['category_id'];
    $subcategories->status = $data['status'];
    $subcategories->slug =  (bool) $data['slug']
          ? \Str::slug($data['slug'])
        : \Str::slug($data['name']);;

    $subcategories->save();

    return redirect()->back()->with('success','subcategories has been added on category');
    }

    public function subcategoryIndex(){

    $subcategories = Subcategory::all();

    return view('admin.pages.subcategories.subcatTable',compact('subcategories'));
    }

    
}
