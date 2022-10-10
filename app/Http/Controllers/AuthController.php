<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\{SignupRequest, SigninRequest};
use Illuminate\Support\Facades\Auth;
use App\Models\Feedbacks;


class AuthController extends Controller
{
    /**
     * Display the signin form.
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */

    public function GetLogin()
    {
        if (Auth::check()) {
            return redirect()->intended(route('feedback'));
        }
        return view('auth.signin');
    }


    /**
     * Signin into account.
     *
     * @param SigninRequest $request
     * @return void
     */

    public function PostLogin(SigninRequest $request)
    {
        $formFields = $request->only(['email', 'password']);
        $user_feedback = Feedbacks::all();

        if (Auth::attempt($formFields)) {
            if (Auth::user()->role) {
                return view('admin.admin', compact('user_feedback'));
            }
            return redirect()->intended(route('feedback'));
        }
        return redirect(route('auth.signin'))->withErrors([
            'email' => 'Не удалось авторизоваться'
        ]);
    }


    /**
     * Display the signup form.
     *
     */

    public function ViewRegistration()
    {
        if (Auth::check()) {
            return redirect()->intended(route('feedback'));
        }
        return view('auth.signup');
    }


    /**
     * Create new user. 
     *
     * @param SignupRequest $request
     * @return void
     */

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
