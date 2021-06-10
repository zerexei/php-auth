<?php

namespace App\Controllers\Auth;

use \SimpleRouter\Request;
use \App\Models\User;

class RegisterController
{
    public function register()
    {
        $request = new Request();
        $attributes = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8', 'max:255', 'confirm']
        ]);
        $attributes['login_at'] = now();

        $user = new User();
        $user->insert($attributes);

        return view('dashboard');
    }
}
