<?php

namespace App\Controllers\Auth;

use \SimpleRouter\Request;
use \App\Models\User;

class RegisterController
{
    public function register()
    {
        $request = new Request();
        verifyCsrf($request->_csrf);

        $attributes = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8', 'max:255', 'confirm']
        ]);
        $attributes['login_at'] = now();

        $user = new User();
        $attributes['password'] = pwd_hash($attributes['password']);

        $user->insert($attributes);

        $auth = $user->select($attributes['email'], 'email');
        $_SESSION['auth'] = $auth->id;

        return redirect('/php-auth/dashboard');
    }

    public function registerForm()
    {
        if (isset($_SESSION['auth']) && $_SESSION['auth']) {
            return redirect('/php-auth/dashboard');
        }

        return view('auth.register');
    }
}
