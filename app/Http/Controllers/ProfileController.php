<?php

namespace App\Http\Controllers;


use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function info()
    {
        $categorys = Category::all();
        $user = Auth::user();
        return view('profile.info', ['user' => $user, 'categorys' => $categorys]);
    }
    public function updateProfile(Request $request)
    {
        $users = Auth::user();
        $user = User::find($users->id);
        $this->validate($request, [
            'name' => 'required',
            'email' => [
                'required',
                'email',
                // Rule::unique('users')->ignore($user->id),
            ],
            'avatar' => 'nullable|image'
        ]);

        $user->edit($request->all());

        //$user->generatePassword($request->get('password'));
        $user->uploadAvatar($request->file('avatar'));

        return view('profile.info', ['user' => $user]);
    }
    public function changePass()
    {
        $categorys = Category::all();
        $user = Auth::user();
        return view('profile.security', ['user' => $user, 'categorys' => $categorys]);
    }
    public function updatePass(Request $request)
    {
        $user = Auth::user();
        $user->generatePassword($request->get('password'));
        return view('profile.info', ['user' => $user]);
    }
}
