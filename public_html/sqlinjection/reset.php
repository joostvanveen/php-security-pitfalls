<?php
/**
 * This code is part of the Tutsplus course PHP Security Pitfalls. 
 * It is meant for demonstration purposes only. 
 * Do not use this code in a production environment!
 */

require 'pdo.php';
$pdo = connect();

$email = "joost@joostvanveen.com"; // Expected value
$email = "1"; // Unexpected value
$email = "1'"; // Unexpected value, designed to test for SQL injection vulnerability
$email = "any_value' OR '1' = '1"; // Always returns a record
$email = "any_value' OR members.email = '1"; // Checking for table name
$email = "any_value' OR users.email = '1"; // Yay! Found a table that exists.
$email = "any_value' OR email != '1"; // Always returns a record because email is never '1'
$email = "any_value'; UPDATE users set email = 'darthvader@thedarkside.com' WHERE email ='joost@joostvanveen.com"; // Ouch. Changed email address into that of a hacker. 
$email = "any_value'; DROP TABLE users;--"; // DRAMA! Dropped entire table.
$email = "joost@joostvanveen.com"; // Pff. Expected value again.

$sql = "SELECT * FROM users WHERE email=:email";
echo "<p>$sql</p>";

// Validate data
// Escaping 
// Bind parameters
// Least privilege

try {
    $query = $pdo->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();
    $user = $query->fetch();
    
    if ($user !== FALSE) {
        // Set up a password reset email
        echo "<p>A password reset email has been sent to {$user['email']}</p>";
    }
}
catch (PDOException $e) {
    echo $e->getMessage();
}