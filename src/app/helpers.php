<?php

/**
 * Encode string
 *
 * @param string $string
 */
if (!function_exists("e")) {
    function e(string $string): string
    {
        return htmlspecialchars($string, ENT_QUOTES);
    }
}

/**
 * Require a view.
 *
 * @param  string $path
 * @param  array  $data
 */
if (!function_exists("view")) {
    function view(string $path, array $data = [])
    {
        // convert array to variable
        extract($data);

        // convert users.create to users/create
        $realSubPath = str_replace('.', '/', e($path));

        // path of file to rquire
        $realPath = "src/Views/{$realSubPath}.view.php";

        // require file
        return require_once $realPath;
    }
}

/**
 * import include file
 */
if (!function_exists("includes")) {
    function includes(string $path)
    {
        $path = str_replace('.', '/', e($path));
        $realPath = "src/Views/includes/{$path}.php";
        return require_once $realPath;
    }
}

/**
 * die and dump
 */
if (!function_exists("dd")) {
    function dd(...$data)
    {
        die(var_dump(...$data));
    }
}
