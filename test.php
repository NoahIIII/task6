<?php
session_start();
include_once 'database/connection.php';
include_once 'helpers/functions.php';
include_once 'helpers/validations.php';
$sql = $con->query("SELECT * from users where id = 2;");
$email = $sql->fetch(PDO::FETCH_ASSOC);
var_dump($email);
echo '<hr>';
echo $email["password"];