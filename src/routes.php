<?php

use App\Controllers\Auth\LoginController;
use App\Controllers\Auth\LogoutController;
use Harf\Arr;
use App\Controllers\Auth\RegisterController;
use App\Models\User;

$router->setHost('php-auth');


$router->get('/', fn () => view('welcome'));

$router->get('/register', fn () => view('auth.register'));
$router->post('/register', [RegisterController::class, 'register']);

$router->get('/login', fn () => view('auth.login'));
$router->post('/login', [LoginController::class, 'login']);

$router->delete('/logout/:int', [LogoutController::class, 'logout']);


$router->get('/dashboard', function () {
    if (!$_SESSION['auth']) {
        return redirect('/php-auth/register');
    }
    return view('dashboard');
});

// TODO: Add csrf
// cookie based session
// reset passowrd
// forgot password
// verify email
// save login datetime
// save logout datetime
// save password update datetime