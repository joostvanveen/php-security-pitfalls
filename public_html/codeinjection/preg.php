<?php
/**
 * This code is part of the Tutsplus course PHP Security Pitfalls.
 * It is meant for demonstration purposes only.
 * Do not use this code in a production environment!
 */

$subject = 'lipsum';
$pattern = '/(.*)/e';
$replacement = 'print(dirname(__FILE__));';
preg_replace($pattern, $replacement, $subject);