<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register()
    {
        return view('user.register');
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
