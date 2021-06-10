<?php

namespace App\Controllers\Auth;

use \SimpleRouter\Request;
use \App\Models\User;

class LoginController
{
    public function login()
    {
        $request = new Request();
        $attributes = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8', 'max:255']
        ]);

        $user = new User();
        $fetchedUser = $user->select($attributes['email'], 'email');

        // validate email
        if (!$fetchedUser) {
            $_SESSION['errors'] = ['auth' => 'email or password didn\'t match'];
            return redirect()->back();
        }

        // validate password
        if ($attributes['password'] !== $fetchedUser->password) {
            $_SESSION['errors'] = ['auth' => 'email or password didn\'t match'];
            return redirect()->back();
        }

        $user->update($fetchedUser->id, ['login_at' => now()]);

        $expire = time() + (60 * 30); // 30 mins
        set_cookie('auth', true, $expire);

        return redirect('/php-auth/dashboard');
    }

    public function loginForm()
    {
        dd($_COOKIE);
        if (isset($_COOKIE['auth']) && $_COOKIE['auth']) {
            return redirect('/php-auth/dashboard');
        }

        return view('auth.login');
    }
}
