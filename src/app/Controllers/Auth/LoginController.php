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

        $user = $user->update($fetchedUser->id, ['login_at' => now()]);

        $_SESSION['auth'] = ['email' => $fetchedUser->email];
        return redirect('/php-auth/dashboard');
    }
}
