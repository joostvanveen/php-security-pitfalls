<?php
/**
 * This code is part of the Tutsplus course PHP Security Pitfalls. 
 * It is meant for demonstration purposes only. 
 * Do not use this code in a production environment!
 */

require 'escape.php';
require '../../vendor/autoload.php';

$string = '<html><h1>Foo</h1><script type="text/javascript">alert("Foo")</script></html>';
echo escape_html($string);
// 1st
if ($_POST) {
    require 'validation.php';
    
    
    $rules = array(
        'name' => 'required|text',
        'comment' => 'required|text',
    );
    $validation = new Validation();
    
    if ($validation->validate($_POST, $rules) == FALSE) {
        echo '<ul>';
        foreach ($validation->errors as $error) {
            echo '<li>' . $error . '</li>';
        }
        echo '</ul>';
        die('ABORT!');
    }
}

require 'views/head.php';
require 'views/body.php';
require 'views/comment.php';
require 'views/tail.php';