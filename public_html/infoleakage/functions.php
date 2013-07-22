<?php
/**
 * This code is part of the Tutsplus course PHP Security Pitfalls.
 * It is meant for demonstration purposes only.
 * Do not use this code in a production environment!
 */

// Detect env
$path = dirname(__FILE__);
switch ($path) {
    case '/Applications/MAMP/htdocs/envato_php_security_pitfalls/public_html/infoleakage':
        $env = 'development';
        break;
    // Other servers
    default:
        $env = 'production';
        break;
}
define('C_ENVIRONMENT', $env);

// Set error reporting
switch (C_ENVIRONMENT) {
    case 'development':
        error_reporting(-1);
        break;
    default:
        error_reporting(0);
        break;
}

// Environment specific debugging
function dump ($msg)
{
    switch (C_ENVIRONMENT) {
        case 'development':
            var_dump($msg);
            break;
        default:
            break;
    }
}