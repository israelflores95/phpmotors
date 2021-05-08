<?php
/*
*Proxy connecction to the phpmotors database
*/

$server = 'mysql';
$dbname = 'phpmotorss';
$username = 'proxy';
$password = '/sqjR@c]fc7hz3kZ';
$dsn = "mysql:host=$server;dbname=$dbname";

$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

try {
    $link = new PDO($dsn, $username, $password, $options);
    if(is_object($link)){
        echo 'it worked!';
    };
} catch(PDOException $e) {
   header('Location: /phpmotors/phpmotors/view/500.php');
};
?>
