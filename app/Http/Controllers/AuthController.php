<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\{SignupRequest, SigninRequest};
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function GetLogin()
    {
        if (Auth::check()) {
            return redirect()->intended(route('feedback'));
        }
        return view('auth.signin');
    }

    public function PostLogin(SigninRequest $request)
    {
        $formFields = $request->only(['email', 'password']);

        if (Auth::attempt($formFields)) {
            return redirect()->intended(route('feedback'));
        }
        return redirect(route('auth.signin'))->withErrors([
            'email' => 'Не удалось авторизоваться'
        ]);
    }

    public function ViewRegistration()
    {
        if (Auth::check()) {
            return redirect()->intended(route('feedback'));
        }
        return view('auth.signin');
    }

    public function PostRegistration(SignupRequest $request)
    {
        $user = User::create([
            'email' => $request->input('email'),
            'name' => $request->input('name'),
            'password' => bcrypt($request->input('password'))
        ]);
        if ($user) {
            Auth::login($user);
            return redirect(route('feedback'));
        }
    }
}
