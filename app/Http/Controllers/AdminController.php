<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use App\Models\News;
use App\Models\Language;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\NewsTranslation;
use App\Models\CategoryTranslation;
use App\Models\SubcategoryTranslation;

class AdminController extends Controller
{
    public function index(){

    $totalNews = News::count();
    $totalUsers = Role::count();
    $totalCategories = Category::count();

      $totalViews = News::sum('views');

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

    


    return view('admin.pages.dashboard', compact('totalNews','totalUsers','totalCategories',   'totalViews',
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
           
    
            'slug'=>'required|string|max:200|unique:categories,slug',
            'status'=>'required|in:active,inactive',
          
        ]);

        $categories = new Category();
        
      
        $categories->slug = $data['slug'];
        $categories->status = $data['status'];
        

        $categories->save();

        Session::flash('success','category has been saved');
        return redirect()->back();
    }

    public function categoryTranslation(){

      $layout = 'admin.layouts.template';
      $languages = Language::all();

    return view('admin.pages.categories.category-translations',compact('layout','languages'));
    }

    public function categoryTranslationStore(Request $request)
{
$request->validate([
'category_id' => 'required|exists:categories,id',
'locale'      => 'required',
'name'        => 'required',
'description' => 'nullable',
]);


$categoryTranslation = new CategoryTranslation();

$categoryTranslation->category_id = $request->category_id;
$categoryTranslation->locale = $request->locale;
$categoryTranslation->name = $request->name;
$categoryTranslation->description = $request->description;

$categoryTranslation->save();

return redirect()->back()
    ->with('success', 'Category translation created successfully.');


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


    public function subcategory()
{
    $categories = Category::with('translation')->get();
    $subcategories = Subcategory::with([
        'category.translation'
    ])->get();

    $layout = 'admin.layouts.template';

    if(auth()->check() && auth()->user()->role_id == 2){
        $layout = 'author.layouts.template';
    }

    return view(
        'admin.pages.subcategories.subcategories-create',
        compact(
            'categories',
            'subcategories',
            'layout'
        )
    );
}


  public function subcategoryTranslationCreate()
{
    $subcategories = Subcategory::all();
    $languages = Language::all();

    $layout = 'admin.layouts.template';

    if(auth()->check() && auth()->user()->role_id == 2){
        $layout = 'author.layouts.template';
    }

    return view(
        'admin.pages.subcategories.subcategory-translate',
        compact('subcategories', 'languages', 'layout')
    );
}

 public function subcategoryStore(Request $request)
{
    $data = $request->validate([
        'category_id' => 'required|exists:categories,id',
        'slug' => 'required|string|unique:subcategories,slug',
        'status' => 'required|boolean',
    ]);

    $subcategory = new Subcategory();

    $subcategory->category_id = $data['category_id'];
    $subcategory->status = $data['status'];
    $subcategory->slug = \Str::slug($data['slug']);

    $subcategory->save();

    return redirect()->back()
        ->with('success', 'Subcategory created successfully.');
}

public function subcategoryTranslationStore(Request $request)
{
    $request->validate([
        'subcategory_id' => 'required|exists:subcategories,id',
        'locale' => 'required',
        'name' => 'required|string|max:255',
        'description' => 'nullable',
    ]);

    $subcategoryTranslation = new SubcategoryTranslation();

    $subcategoryTranslation->subcategory_id = $request->subcategory_id;
    $subcategoryTranslation->locale = $request->locale;
    $subcategoryTranslation->name = $request->name;
    $subcategoryTranslation->description = $request->description;

    $subcategoryTranslation->save();

    return redirect()->back()
        ->with('success', 'Subcategory translation created successfully.');
}

 public function subcategoryIndex()
{
    $subcategories = Subcategory::with([
        'category.translation',
        'translation'
    ])->get();

    $layout = 'admin.layouts.template';
      // for author dashboard
   
      if(auth()->check() && auth()->user()->role_id == 2){
        $layout = 'author.layouts.template';
      }
    if(auth()->check() && auth()->user()->role_id == 2){
        $layout = 'author.layouts.template';

    }

    return view(
        'admin.pages.subcategories.subcatTable',
        compact('subcategories', 'layout')
    );
}


    
    





 public function search(Request $request)
    {
        $search = $request->search;

        $news = News::whereHas('translations', function ($query) use ($search) {
            $query->where('title', 'LIKE', "%{$search}%");
        })->latest()->paginate(10);

        return view('admin.pages.search.index', compact('news', 'search'));
    }
}



