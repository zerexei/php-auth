<?php

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
