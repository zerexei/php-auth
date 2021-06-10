<?php

namespace App\Controllers\Auth;

use \SimpleRouter\Request;
use \App\Models\User;

class LogoutController
{
    public function logout($id)
    {
        $request = new Request();
        verifyCsrf($request->_csrf);
        
        $user = new User;
        $user = $user->update($id, ['logout_at' => now()]);

        if (!$user) {
            throw new \Exception("User doesn't exists, please refresh the webage and try again");
        }

        session_destroy();

        return redirect('/php-auth');
    }
}
