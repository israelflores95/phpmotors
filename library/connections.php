<?php
/*
*Proxy connecction to the phpmotors database
*/
function phpmotorsConnect() {

$server = 'mysql';
$dbname = 'phpmotors';
$username = 'proxy';
$password = '/sqjR@c]fc7hz3kZ';
$dsn = "mysql:host=$server;dbname=$dbname";

$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

try {
    $link = new PDO($dsn, $username, $password, $options);
    if(is_object($link)){
        echo '';
    };
    return $link;
} catch(PDOException $e) {
   header('Location: /phpmotors/view/500.php');
};


};

phpmotorsConnect();
?>
