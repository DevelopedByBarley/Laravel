<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegistrationController extends Controller
{

    public function create()
    {
        return view('auth.register');
    }
    public function store()
    {
        // validate
        $validated_user = request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email', 'max:254'],
            'password' => ['required', Password::min(6), 'confirmed'] // -> password_confirmation
        ]);

        // create the user
        $user = User::create($validated_user);

        // log in
        Auth::login($user);

        // redirect;
        return redirect('/jobs');
    }
}
