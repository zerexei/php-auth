<?php

namespace App\Controllers\Auth;

use \SimpleRouter\Request;
use \App\Models\User;

class PasswordResetController
{

    public function passwordReset()
    {
        $request = new Request();
        verifyCsrf($request->_csrf);
        
        $attributes = $request->validate([
            'password' => ['required', 'min:8', 'max:255', 'confirm']
        ]);

        $user = new User();
        $fetchedUser = $user->select($request->id);

        if ($request->old_password !== $fetchedUser->password) {
            $_SESSION['errors'] = ['password' => 'old password didn\'t match'];
            return redirect()->back();
        }

        $x = $user->update($fetchedUser->id, [
            'password' => $attributes['password'],
            'updated_at' => now()
        ]);
        
        return redirect('/php-auth/dashboard');
    }

    public function passwordResetForm($id)
    {
        if (!isset($_SESSION['auth']) && !$_SESSION['auth']) {
            return redirect('/php-auth/login');
        }

        $user = new User();
        $user = $user->select($id);

        if (!$user) {
            $_SESSION['errors'] = ['user' => 'User doesn\'t exists'];
            return redirect()->back();
        }

        return view('auth.password-reset', ['user' => $user]);
    }
}
