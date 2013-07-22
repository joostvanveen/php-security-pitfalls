<?php
/**
 * This code is part of the Tutsplus course PHP Security Pitfalls. 
 * It is meant for demonstration purposes only. 
 * Do not use this code in a production environment!
 */

// function.php?id=1&template=home
/* Possible injections */ 
// function.php?id=4&template=phpinfo
// function.php?id=-1&template=error_reporting

$id = isset($_GET['id']) ? $_GET['id'] : 1;
$template = isset($_GET['template']) ? htmlentities($_GET['template']) : 'home';

// Validation. If you comment this out, the page is vulnerable to code injection
$valid = array('home');
if (!is_int($id) && !in_array($template, $valid)) {
    // ABORT!
    die('Page cannot be found');
}

echo $template($id);

function get_page_data($id){
    return array('title' => 'Some title');
}

function home($id){
    $data = get_page_data($id);
    $html = "<html><h1>{$data['title']}</h1></html>";
    return $html;
}

