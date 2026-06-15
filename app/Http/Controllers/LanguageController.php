<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Language;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function form(){

    $layout = 'admin.layouts.template';

      // for author dashboard
   if(auth()->check() && auth()->user()->role_id == 2){
        $layout = 'author.layouts.template';
    }

    return view('admin.pages.languages.add', compact('layout'));
    }

    public function store(Request $request){
        $data = $request->validate([
            'name'=>'required|string',
             'code' => 'required|string|max:2|unique:languages,code'
        ]);

        $languages = new Language();
        $languages->name = $data['name'];
        $languages->code = $data['code'];

        $languages->save();

        return redirect()->back()->with('success','language has been added');
    }

    public function langIndex(){

    $languages = Language::all();

    return view('admin.pages.languages.lang-index',compact('languages'));
    }

    public function edit(Language $language){

    return view('admin.pages.languages.edit',compact('language'));
    }

    public function update(Request $request , Language $language){

    $data = $request->validate([
        'name'=>'required|string',
        'code'=>'required'
    ]);

    $language->name = $data['name'];
    $language->code = $data['code'];

    $language->save();

    return redirect()->back()->with('success','your language has been updated');
}
// public function setLanguage(Request $request)
// {
//     Session::put('lang', $request->language);

//     return response()->json(['success' => true]);
// }

public function changeLanguage(Request $request)
{
    session([
        'lang'=>$request->language
    ]);
    // dd(session('lang'));

    return redirect()->back();
}

public function index(){

$languages = Language::all();
$layout = 'admin.layouts.template';
  // for author dashboard
   if(auth()->check() && auth()->user()->role_id == 2){
        $layout = 'author.layouts.template';
    }

return view('admin.pages.languages.index', compact('languages', 'layout'));
}
}
