<?php
/**
 * This code is part of the Tutsplus course PHP Security Pitfalls. 
 * It is meant for demonstration purposes only. 
 * Do not use this code in a production environment!
 */
class csrf
{
    public function get_token ()
    {
        // Create a token
        $token = hash('sha512', mt_rand(0, mt_getrandmax()) . microtime(TRUE));
        $_SESSION['token'] = $token;
        return $token;
    }

    public function check_token ($token)
    {
        // Check token against the session
        $sessiontoken = $this->get_token_from_session();
        $valid = strlen($sessiontoken) == 128 && strlen($token) == 128 && $sessiontoken == $token;
        $this->get_token();
        return $valid;
    }
    
    public function get_token_from_url ()
    {
        return isset($_GET['token']) ? $_GET['token'] : '';
    }
    
    public function get_token_from_session ()
    {
        return isset($_SESSION['token']) ? $_SESSION['token'] : '';
    }
}