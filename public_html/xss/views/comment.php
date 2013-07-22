<?php
/**
 * This code is part of the Tutsplus course PHP Security Pitfalls.
 * It is meant for demonstration purposes only.
 * Do not use this code in a production environment!
 */

if (!empty($_POST['comment'])) {
    echo '<h1>Your name</h1>';
    echo escape($_POST['name']);
    echo '<h1>Your comment</h1>';
    echo escape($_POST['comment']);
}

// plain text
// html text from CMS