<?php
/**
 * This code is part of the Tutsplus course PHP Security Pitfalls. 
 * It is meant for demonstration purposes only. 
 * Do not use this code in a production environment!
 */

require 'functions.php';

session_unset();
session_destroy();
header('location: index.php');