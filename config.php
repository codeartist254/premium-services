<?php
/**
 * @Project  : mTrack Bulk sms.
 * @Author   : ogegoe
 * @Copyright: Copyright (c) 2015. All Rights Reserved.
 */

# Set session name!
session_name('_admin');
session_start();

# Define Globals!
if (!defined('__ROOT__')) {
    # Path Separator!
    define('PS', PATH_SEPARATOR);

    # Directory separator!
    define('DS', DIRECTORY_SEPARATOR);

    # Root Directory!
    define('__ROOT__', __DIR__);

    # System Directory!
    define('__SYS__', __ROOT__ . sprintf('%1$ssystem%1$s', DS));

    # API Directory!
    define('__APIS__', __SYS__ . sprintf('apis%1$s', DS));

    # Set Include path!
    set_include_path(
        get_include_path() . PS
        . __SYS__ . sprintf('%1$scontrollers%1$s', DS) . PS
        . __SYS__ . sprintf('%1$sobjects%1$s', DS) . PS
        . __SYS__ . sprintf('%1$sservices%1$s', DS) . PS
        . __SYS__ . sprintf('%1$sutilities%1$s', DS) . PS
    );

    # Auto-load classes!
    spl_autoload_register(function ($class) {
        # Exclude smarty classes, already loaded in smarty main class!
        if ((preg_match("/smarty/i", $class)) || $class === 'finfo') {
            return;
        }

        $file = "$class.php";

        return include_once $file;
    });

    # Set cdn path
    define('CDN', 'https://cdn.bulksms.com/');

    # Set the survey system domain...
    define('SS_D', 'https://admin.bulksms.com/');

    # Set uploads url
    define('UPLOADS', SS_D . 'uploads/');

    # Set session user identifier!
    define('SS_USER', 'user');

    # Set copyright statement
    define('COPYRIGHT', 'mTrack  &copy; %s. All right Reserved.');

}
$config = [
    'mysql' => [
        'host'     => 'localhost',
        'database' => 'bulksms',
        'port'     => '',
        'user'     => 'root',
        'password' => ''
    ]
];

/**
 * Get a value from a config
 *
 * @param $key
 *
 * @return null
 */
function config ($key) {
    global $config;
    return array_get($config, $key);
}

/**
 * Get a value from an array given a specific key
 *
 * @param      $haystack
 * @param      $needle
 * @param null $default
 *
 * @return null
 */
function array_get ($haystack, $needle, $default = null) {
    if ($needle) {
        foreach (explode('.', $needle) as $key) {
            if (is_array($haystack) && array_key_exists($key, $haystack)) {
                $haystack = $haystack[ $key ];
            } else {
                return $default;
            }
        }

        return $haystack;
    }

    return $default;
}

/**
 * @param $var
 */
function dd ($var) {
    echo "<pre>";
    print_r($var);
    echo "</pre>";
    die;
}

function dump ($var) {
    echo "<pre>";
    print_r($var);
    echo "</pre>";
}