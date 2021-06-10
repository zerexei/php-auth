<?php

namespace App\Controllers\Auth;

use SimpleRouter\Request;

class RegisterController
{
    public function register()
    {
        $request = new Request();
        dd($request);
    }
}
