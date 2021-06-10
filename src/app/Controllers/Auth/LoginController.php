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
        $result = $user->select($attributes['email'], 'email');

        // validate email
        if (!$result) {
            $_SESSION['errors'] = ['auth' => 'email or password didn\'t match'];
            return redirect()->back();
        }

        // validate password
        if ($attributes['password'] !== $result->password) {
            $_SESSION['errors'] = ['auth' => 'email or password didn\'t match'];
            return redirect()->back();
        }

        return view('dashboard');
    }
}
