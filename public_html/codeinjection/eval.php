<?php
/**
 * This code is part of the Tutsplus course PHP Security Pitfalls. 
 * It is meant for demonstration purposes only. 
 * Do not use this code in a production environment!
 */

$var = 1;
$newvalue = isset($_GET['id']) ? $_GET['id'] : 0;
eval('$var = ' . $newvalue . ';');
echo $var;

/* Possible injections */
// $_GET['id'] = 'phpinfo()';
// $_GET['id'] = 'dirname(__FILE__)';
