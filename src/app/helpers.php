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
    function includes(string $path, array $data = [])
    {
        extract($data);
        $path = str_replace('.', '/', e($path));
        $realPath = "src/Views/includes/{$path}.php";
        return require_once $realPath;
    }
}

/**
 * Create method field
 *
 * @return string
 */

if (!function_exists('method_field')) {
    function method_field(string $method)
    {
        return '<input
            type="hidden"
            name="_method"
            value="' . e($method) . '"
        >';
    }
}

/**
 * get current time
 */
if (!function_exists("now")) {
    function now(): string
    {
        return (new \DateTime())->format("Y-m-d H:i:s");
    }
}
/**
 * create cookie
 */
if (!function_exists("set_cookie")) {
    function set_cookie(string $name, string $value, int|null $expire = null): bool
    {
        $expire = $expire ?? time() + 60;

        return setcookie(
            name: $name,
            value: $value,
            expires_or_options: $expire,
            path: "/php-auth",
        );
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
