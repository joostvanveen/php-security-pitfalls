<?php
/**
 * This code is part of the Tutsplus course PHP Security Pitfalls. 
 * It is meant for demonstration purposes only. 
 * Do not use this code in a production environment!
 */

require 'functions.php';
require 'csrf.php';

$csrf = new csrf();

if (! empty($_SESSION['loggedin']) && $_SESSION['loggedin'] === TRUE) {
    $account = isset($_GET['account']) ? (int) $_GET['account'] : 0;
    $amount = isset($_GET['amount']) ? (int) $_GET['amount'] : 0;
    
    if ($account > 0 && $amount > 0) {
        // Transfer
        $token = $csrf->get_token_from_url();
        if ($csrf->check_token($token) == FALSE) {
            die('You rascal!');
        }
        
        $filename = 'transfers.txt';
        $data = file_get_contents($filename);
        $msg = "A transfer of {$amount} has been made to account {$account}\n";
        $data .= $msg;
        file_put_contents($filename, $data);
        echo $msg;
    }
    else{
        $token = $csrf->get_token();
        echo '<h1>No transfer could be made</h1>';
        echo '<a href="index.php?amount=10&account=1234&token=' . $token . '">Transfer $10 into account 1234</a>';
    }
}
else {
    $token = $csrf->get_token();
    echo '<h1>You need to login, man!</h1>';
    echo '<a href="login.php?token=' . $token . '">Login</a>';
}
