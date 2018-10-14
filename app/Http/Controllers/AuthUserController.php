<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AuthUserController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }
    public function registration()
    {
        return view('auth.registration');
    }
    public function store(Request $request)
    {
        if ($request['password'] !== $request['password1']) {
            return false;
        }

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required',
        ]);

        $user = User::add($request->all());
        $user->generatePassword($request->get('password'));
        return redirect('/login');
    }
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required']);
        if (Auth::attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password')])) {
            return redirect('/');
        }
        return redirect()->back()->with('status', 'Неправильный логин или пароль');
        Auth::check();
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

}
