<?php

use App\Models\Language;

if (!function_exists('lan_key')) {
    function lan_key($key)
    {
        if (session()->has('language')) {
            $sl = session()->get('language');
            $lg = Language::find($sl['language_id']);
        } else {
            $lg = Language::where('default_status', 1)->first();
        }
        // dd(session()->get('language'));
        $lan_key = json_decode($lg->key, true);

        // dd($lan_key);

        return key_exists($key, $lan_key) ? $lan_key[$key] : $key;
    }
}
