<?php 
/**
 * This code is part of the Tutsplus course PHP Security Pitfalls. 
 * It is meant for demonstration purposes only. 
 * Do not use this code in a production environment!
 */

error_reporting(-1);

require 'functions.php';

require 'non-existing-file.php';
echo $foo;

// Login
// joost@foo.com
echo 'This combination of email and password does not exist';
