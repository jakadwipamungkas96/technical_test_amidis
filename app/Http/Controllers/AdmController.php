<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdmController extends Controller
{
    public function loginview(Request $request)
    {
        return view('auth.login');
    }
}
