<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;

class LocalizationController extends Controller
{
    // public function index()
    // {
    //     $welcomeMessage = __('messages.welcome');
    //     $lan = session()->get('language');
    //     return view('welcome', compact('welcomeMessage', 'lan'));
    // }

    // public function changeLanguageOld($locale)
    // {
    //     if (in_array($locale, ['en', 'bn'])) {
    //         session(['locale' => $locale]);
    //     }

    //     return redirect()->back();
    // }




    public function changeLanguage(Request $request)
    {
    //    dd($request);
        $language = Language::where('id',$request->input('language_id'))->select('name','id')->first();
        // dd($language);
        if ($language){
            session(['language' => ['language_id'=>$language->id]]);
        }
        // dd($language);
        return redirect()->back();
    }




}
