<?php

namespace App\Controllers\Auth;

use \SimpleRouter\Request;
use \App\Models\User;

class LogoutController
{
    public function logout()
    {
        // TODO: destroy all
        return view('welcome');
    }
}
