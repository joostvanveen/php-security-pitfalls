<?php
/**
 * This code is part of the Tutsplus course PHP Security Pitfalls. 
 * It is meant for demonstration purposes only. 
 * Do not use this code in a production environment!
 */

require 'functions.php';

// Check token
require 'csrf.php';
$csrf = new csrf();
if ($csrf->check_token($csrf->get_token_from_url()) == FALSE){
    die('You cannot login');
}

$_SESSION['loggedin'] = TRUE;
header('location: index.php');