<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use App\Models\News;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\NewsTranslation;

class AdminController extends Controller
{
    public function index(){

    $totalNews = News::count();
    $totalUsers = Role::count();
    $totalCategories = Category::count();

$newsByMonth = NewsTranslation::whereNotNull('created_at')
    ->selectRaw('MONTH(created_at) as month, COUNT(*) as total')
    ->groupByRaw('MONTH(created_at)')
    ->orderByRaw('MONTH(created_at)')
    ->get();

   $latestNews = NewsTranslation::with('news')
    ->whereHas('news', function ($query) {
        $query->where('status', 'published');
    })
    ->latest()
    ->take(3)
    ->get();

   $recentNews = News::with(['category', 'translations'])
    ->latest()
    ->take(10)
    ->get();

    $categoryData = Category::withCount('news')->get();

    


    return view('admin.pages.dashboard', compact('totalNews','totalUsers','totalCategories', 
     'newsByMonth','latestNews','recentNews','categoryData'));
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
        $users->phone = $data['phone'];
        $users->password = Hash::make($data['password']);
        $users->role_id = $data['role_id'];

        $users->save();

        Session::flash('success','users data has been saved');
        return redirect()->back();

    }

    public function usersIndex()
    {
        $users = User::with('role')->get();

        return view('admin.pages.users.index', compact('users'));
    }

    
    // -------------------- USERS EDIT -------------------- //

public function usersEdit($id)
{
    $user = User::findOrFail($id);
    $roles = Role::all();

    return view('admin.pages.users.edit', compact('user', 'roles'));
}


public function usersUpdate(Request $request, $id)
{
    $data = $request->validate([
        'name' => 'required|string|max:300',
        'username' => 'required|string|max:300',
        'email' => 'required|email',
        'phone' => 'required|string',
        'password' => 'nullable|string|max:20',
        'role_id' => 'required',
    ]);

    $user = User::findOrFail($id);

    $user->name = $data['name'];
    $user->username = $data['username'];
    $user->email = $data['email'];
    $user->phone = $data['phone'];
    $user->role_id = $data['role_id'];

    
    if (!empty($data['password'])) {
        $user->password = Hash::make($data['password']);
    }

    $user->save();

    Session::flash('success', 'User updated successfully');
    return redirect()->route('users.form');
}


public function usersDelete($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    Session::flash('success', 'User deleted successfully');
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

    // -------------------- ROLES EDIT -------------------- //

public function rolesEdit($id)
{
    $role = Role::findOrFail($id);

    return view('admin.pages.roles.edit', compact('role'));
}


// -------------------- ROLES UPDATE -------------------- //

public function rolesUpdate(Request $request, $id)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $role = Role::findOrFail($id);
    $role->name = $data['name'];
    $role->save();

    Session::flash('success', 'Role updated successfully');
    return redirect()->route('get.rolesIndex');
}


// -------------------- ROLES DELETE -------------------- //

public function rolesDelete($id)
{
    $role = Role::findOrFail($id);
    $role->delete();

    Session::flash('success', 'Role deleted successfully');
    return redirect()->back();
}


    public function rolesIndex(){

    $roles = Role::all();
    
    return view('admin.pages.roles.rolesTable',compact('roles'));
    } 

    // --------------------------------------category-----------------------------//

    public function categoryForm(){

    $categories = Category::all();
    $layout = 'admin.layouts.template';

      // for author dashboard
   if(auth()->check() && auth()->user()->role_id == 2){
        $layout = 'author.layouts.template';
    }

    return view('admin.pages.categories.form', compact('categories', 'layout'));
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

    $layout = 'admin.layouts.template';

      // for author dashboard
   if(auth()->check() && auth()->user()->role_id == 2){
        $layout = 'author.layouts.template';
    }

    return view('admin.pages.categories.catTable', compact('layout'));
    }

    public function categoryEdit(Category $category){

    return view('admin.pages.categories.edit');
    }

    // ------------------------------------------subcategories------------------------------------//

    public function subcategory(){

    $categories = Category::all();
    $subcategories = Subcategory::all();
    $layout = 'admin.layouts.template';

      // for author dashboard
   if(auth()->check() && auth()->user()->role_id == 2){
        $layout = 'author.layouts.template';
    }

    return view('admin.pages.subcategories.form',compact('categories','subcategories', 'layout'));
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

      $layout = 'admin.layouts.template';

    $layout = 'admin.layouts.template';
<<<<<<< HEAD

=======
>>>>>>> 4c364ed4a909a4be184337979c1de2ccdd96f193

      // for author dashboard
   
      if(auth()->check() && auth()->user()->role_id == 2){
        $layout = 'author.layouts.template';
<<<<<<< HEAD

        
=======


       
       
>>>>>>> 4c364ed4a909a4be184337979c1de2ccdd96f193

    }

    return view('admin.pages.subcategories.subcatTable',compact('subcategories', 'layout'));
    }


    
    
}
