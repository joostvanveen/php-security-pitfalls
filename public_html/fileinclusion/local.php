<?php
/**
 * This code is part of the Tutsplus course PHP Security Pitfalls. 
 * It is meant for demonstration purposes only. 
 * Do not use this code in a production environment!
 */
 
/* Vulnerable */
// Expected: local.php?file=123_log.php
// Exploit: local.php?file=../../../../../../etc/passwd

$file = isset($_GET['file']) ? $_GET['file'] : NULL;

if ($file === NULL) {
    die('Invalid filename');
}

include '../logs/' . $file; 

/* Security Fix */
// local.php?file=123_log

// Set error reporting to avoid information leakage
error_reporting(0);

// Validation - filename can only be like :number_log
$pattern = '/^[0-9]+_log$/';
$file = isset($_GET['file']) ? $_GET['file'] : NULL;
if (!preg_match($pattern, $file)) {
    die('File could not be found');
}

// Include file only if it exists
$filename = '../logs/' . $file . '.php';
if (file_exists($filename) && is_file($filename)) {
    include $filename;
}
else {
    die('File could not be located');
}