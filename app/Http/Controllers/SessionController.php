<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }
    public function store(User $user)
    {
        // validate
        $validated_user = request()->validate([
            'email' => ['required', 'email', 'max:254'],
            'password' => ['required', Password::min(6)] // -> password_confirmation
        ]);

        // attempt to login user

       if(!Auth::attempt($validated_user)) {
        throw ValidationException::withMessages([
            'email' => 'Sorry, those credentials do not match'
        ]);
       }

        // regenerate the session token
        request()->session()->regenerate();
        // redirect

        return redirect('/jobs');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/');
    }
}
