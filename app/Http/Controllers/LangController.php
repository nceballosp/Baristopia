<?php

// NCP

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class LangController extends Controller
{
    public function index(string $lang): RedirectResponse
    {
        app()->setLocale($lang);
        session()->put('locale', $lang);

        return redirect()->back();
    }
}
