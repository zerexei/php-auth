<?php

use Harf\Arr;
use App\Controllers\Auth\RegisterController;

$router->setHost('php-auth');


$router->get('/', fn () => view('welcome'));

$router->get('/register', fn () => view('auth.register'));
$router->post('/register', [RegisterController::class, 'register']);

$router->get('/login', fn () => view('auth.login'));

// TODO: Add csrf
// // register
// login
// logout