<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Language;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function form(){

    return view('admin.pages.languages.add');
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

return view('admin.pages.languages.index', compact('languages'));
}
}
