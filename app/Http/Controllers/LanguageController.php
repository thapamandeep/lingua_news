<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Validation\Rule;

class LanguageController extends Controller
{
    /**
     * Get dashboard layout
     */
    private function getLayout()
    {
        if (auth()->check() && auth()->user()->role_id == 2) {
            return 'author.layouts.template';
        }

        return 'admin.layouts.template';
    }

    /**
     * Display all languages
     */
    public function index()
    {
        $languages = Language::orderBy('name')->get();

        return view('admin.pages.languages.index', [
            'languages' => $languages,
            'layout'    => $this->getLayout(),
        ]);
    }

    /**
     * Show add language form
     */
    public function form()
    {
        return view('admin.pages.languages.add', [
            'layout' => $this->getLayout(),
        ]);
    }

    /**
     * Store language
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:100',
            ],

            'code' => [
                'required',
                'string',
                'size:2',
                'unique:languages,code',
            ],
        ]);

        Language::create([
            'name' => trim($validated['name']),
            'code' => strtolower(trim($validated['code'])),
        ]);

        return redirect()->back()->with(
            'success',
            __('common.language_added')
        );
    }

    /**
     * Show language list for frontend dropdown
     */
    public function langIndex()
    {
        $languages = Language::orderBy('name')->get();

        return view('admin.pages.languages.lang-index', [
            'languages' => $languages,
            'layout'    => $this->getLayout(),
        ]);
    }

    /**
     * Show edit page
     */
    public function edit(Language $language)
    {
        return view('admin.pages.languages.edit', [
            'language' => $language,
            'layout'   => $this->getLayout(),
        ]);
    }

    /**
     * Update language
     */
    public function update(Request $request, Language $language)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:100',
            ],

            'code' => [
                'required',
                'string',
                'size:2',
                Rule::unique('languages')->ignore($language->id),
            ],
        ]);

        $language->update([
            'name' => trim($validated['name']),
            'code' => strtolower(trim($validated['code'])),
        ]);

        return redirect()->back()->with(
            'success',
            __('common.language_updated')
        );
    }

    /**
     * Change website language
     */
public function changeLanguage(Request $request)
{
    $validated = $request->validate([
        'language' => [
            'required',
            Rule::exists('languages', 'code'),
        ],
    ]);

    $language = Language::where('code', $validated['language'])->first();

    session([
        'lang' => $language->code,
        'language_id' => $language->id,
    ]);

     dd(session()->all());
     
    return redirect()->back();
}
}