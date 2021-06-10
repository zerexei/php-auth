<?php

// no type coercion allowed
declare(strict_types=1);

// check if session started
if (session_status() === PHP_SESSION_NONE) {
    // start a session
    session_start();
}

use \SimpleRouter\Router;
use \SimpleRouter\Request;

require __DIR__ . '/vendor/autoload.php';

require_once 'src/app/helpers.php';

$config = require_once 'config.php';
define('CONFIG', $config);

// router
$router = Router::init();
require_once 'src/routes.php';
$router->run(Request::url(), Request::method());
