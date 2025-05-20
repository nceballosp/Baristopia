<?php

//NCP

namespace App\Http\Controllers;

use Illuminate\View\View;

class AdminHomeController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard');
    }

}
