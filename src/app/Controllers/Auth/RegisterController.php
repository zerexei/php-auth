<?php

namespace App\Controllers\Auth;

use \SimpleRouter\Request;
use \App\Models\User;

class RegisterController
{
    public function register()
    {
        $request = new Request();
        $user = new User();
        $result = $user->insert($request->all());
        dd($result);
    }
}
