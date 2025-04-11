<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
class LanguageController extends Controller
{
    public function change($lang)
    {
        if (!in_array($lang, ['en', 'tr'])) {
            abort(400, 'Language not supported');
        }

        Session::put('locale', $lang);

        return redirect()->back();
    }
}
