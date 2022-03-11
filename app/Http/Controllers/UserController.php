<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUser;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register()
    {
        return view('user.register');
    }

    public function store(RegisterUser $request)
    {
        $user = User::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        session()->flash('success', 'Регистрация пройдена');
        Auth::login($user);
        return redirect()->home()->with('success', 'Регистрация пройдена');
    }
}
