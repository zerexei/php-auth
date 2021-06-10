<?php

use App\Controllers\Auth\LoginController;
use App\Controllers\Auth\LogoutController;
use App\Controllers\Auth\PasswordResetController;
use Harf\Arr;
use App\Controllers\Auth\RegisterController;
use App\Models\User;

$router->setHost('php-auth');

$router->get('/', fn () => view('welcome'));

// REGISTER
$router->get('/register', [RegisterController::class, 'registerForm']);
$router->post('/register', [RegisterController::class, 'register']);

// LOGIN
$router->get('/login', [LoginController::class, 'loginForm']);
$router->post('/login', [LoginController::class, 'login']);

// UPDATE PASSWORD
$router->get('/password/:int/reset', [PasswordResetController::class, 'passwordResetForm']);

// LOGOUT
$router->delete('/logout/:int', [LogoutController::class, 'logout']);



$router->get('/dashboard', function () {

    if (!isset($_SESSION['auth']) && !$_SESSION['auth']) {
        return redirect('/php-auth/login');
    }

    return view('dashboard');
});

// TODO: Add csrf
// reset passowrd
// forgot password
// verify email
// save password update datetime