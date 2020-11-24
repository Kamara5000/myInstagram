<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname =  'instagram';
$con = new mysqli($host, $user, $password, $dbname);
if ($con->connect_error) {
    die('unable to connect');
}

?>