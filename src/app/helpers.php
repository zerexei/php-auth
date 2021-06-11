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
 * Set csrf token
 */
if (!function_exists('csrf_token')) {
    function csrf_token()
    {
        // check if token already set
        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION["csrf_token"] = bin2hex(random_bytes(32)); // hash
            $_SESSION["csrf_lifespan"] = time() + 3600; // +60 minutes
            return $_SESSION["csrf_token"];
        }

        // return existing token
        // usable for one or more csrf field
        return $_SESSION["csrf_token"];
    }
}

/**
 * Create csrf field
 *
 * @return string
 */

if (!function_exists('csrf_field')) {
    function csrf_field()
    {
        return '<input
            type="hidden"
            name="_csrf"
            value="' . csrf_token() . '"
        >';
    }
}


/**
 * Verify CSRF token
 */

if (!function_exists('verifyCsrf')) {
    function verifyCsrf(string $hash)
    {
        // check if csrf token exists
        if (!isset($_SESSION['csrf_token'])) return false;

        // check if csrf token exired
        $expired = $_SESSION['csrf_lifespan'] < time();

        // compare csrf token and csrf field
        $matched = hash_equals($_SESSION['csrf_token'],  $hash);

        if ($expired || !$matched) {
            $_SESSION['errors'] = ['csrf' => 'csrf token didnt match.'];
            return redirect()->back();
        };

        // remove csrf sessions
        unset($_SESSION['csrf_token']);
        unset($_SESSION['csrf_lifespan']);

        // csrf token and csrf field matched
        return true;
    }
}

/**
 * hash password
 */
if (!function_exists("pwd_hash")) {
    function pwd_hash(string $password): string|false
    {
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        while (password_needs_rehash($hashed, PASSWORD_DEFAULT)) {
            $hashed = password_hash($password, PASSWORD_DEFAULT);
        }
        return $hashed;
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
