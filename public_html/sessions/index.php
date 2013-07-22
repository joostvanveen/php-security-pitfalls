<?php
/**
 * This code is part of the Tutsplus course PHP Security Pitfalls. 
 * It is meant for demonstration purposes only. 
 * Do not use this code in a production environment!
 */

// session_start();
// $_SESSION['username'] = 'Joost';
// $_SESSION['loggedin'] = TRUE;
// $_SESSION['role'] = 'admin';

// echo '<pre>x';
// var_dump(session_id());
// var_dump(session_get_cookie_params());
// var_dump($_SESSION);

// Every 5 minutes
session_regenerate_id();

// session.use_only_cookies = 1
session_destroy();
session_unset();

// XSS
// https
// No remember me

