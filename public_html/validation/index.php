<?php 
/**
 * This code is part of the Tutsplus course PHP Security Pitfalls. 
 * It is meant for demonstration purposes only. 
 * Do not use this code in a production environment!
 */
 
 if ($_POST) {
    require 'validation.php';
    
    $rules = array(
        'email' => 'email|example|required',
        'password' => 'required',
        'environment' => 'required|environment',
    );
    $validation = new Validation();
    
    if ($validation->validate($_POST, $rules) == TRUE) {
        var_dump($_POST);
    }
    else {
        echo '<ul>';
        foreach ($validation->errors as $error) {
            echo '<li>' . $error . '</li>';
        }
        echo '</ul>';
        die('ABORT!');
    }
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

<form action="#" method="post" novalidate>
    <input type="hidden" name="environment" id="environment" value="admin">
    <p>
        E-mail: <input type="email" name="email" id="email" required>
    </p>
    <p>
        Password: <input type="password" name="password" id="password" required>
    </p>
    <p>
        <input type="submit" name="submit" id="submit" value="Log in">
    </p>
</form>

</body>
</html>