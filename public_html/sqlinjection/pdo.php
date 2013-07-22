<?php
/**
 * This code is part of the Tutsplus course PHP Security Pitfalls.
 * It is meant for demonstration purposes only.
 * Do not use this code in a production environment!
 */

function connect ()
{
    return new PDO('mysql:host=localhost;dbname=sqlinjection', 'joostvanveen', 'tutsplus', array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}