<?php
/**
 * This code is part of the Tutsplus course PHP Security Pitfalls.
 * It is meant for demonstration purposes only.
 * Do not use this code in a production environment!
 */

// $password = 'w3lc0m3';
// echo md5($password);

// $rainbow = array(
//     md5('secret') => 'secret',
//     md5('welcome') => 'welcome',
//     md5('w3lc0m3') => 'w3lc0m3',
// );

// tree
// Tree01
// 3 e
// 0 0

require '../../vendor/autoload.php';
$password = 'hknB7sW3%L*!';
$hash = password_hash($password, PASSWORD_DEFAULT, array('cost' => 10));
echo "<p>$hash</p>";

var_dump(password_verify($password, $hash));