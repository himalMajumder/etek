<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function index()
    {
        $languages = Language::get();
        return view('BackEnd.language.index', compact('languages'));
    }

    public function edit($id)
    {
        $language = Language::find($id);
        return view('BackEnd.language.edit', compact('language'));
    }

    public function update(Request $request,$id)
    {
        try {
            $data = $request->except("_token");
            $language = Language::find($id);
            $language->update(['key' => json_encode($data)]);
            // Toastr::success('Banner updated successfully!');
            return redirect()->back();
        }catch (\Exception $exception){
            // Toastr::error($exception->getMessage());
            return redirect()->back();
        }
    }
}
