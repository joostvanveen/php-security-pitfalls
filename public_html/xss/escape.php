<?php
/**
 * This code is part of the Tutsplus course PHP Security Pitfalls. 
 * It is meant for demonstration purposes only. 
 * Do not use this code in a production environment!
 */
 
function escape($string){
   return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

function escape_html($string){
    $config = HTMLPurifier_Config::createDefault();
    $purifier = new HTMLPurifier($config);
    return $purifier->purify($string);
}