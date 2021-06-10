<?php

use Harf\Arr;

$router->setHost('php-auth');

$router->get('/', function () {
    echo "Hello World!";
    
    $result = Arr::find([1, 2, 3], 4);

    die(var_dump($result));
});
