<?php

namespace App\Controllers\Auth;

use \SimpleRouter\Request;
use \App\Models\User;

class PasswordResetController
{
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
