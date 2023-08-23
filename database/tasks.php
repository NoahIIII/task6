<?php
session_start();
include_once '../database/connection.php';
include_once '../helpers/functions.php';
include_once '../helpers/validations.php';
$errors=[];
$task=sanitization($_POST['task']);
if(!empty($task) ){
$sql=$con->prepare("insert into tasks (task,user_id) values ('$task','{$_SESSION['auth']['id']}')");
$sql->execute();
header('location:../profile.php');
}
else{
  $errors[]='the new task can not be empty';
  $_SESSION['errors']=$errors;
  header('location:../profile.php');
}
// <td><button class="btn btn-sm btn-danger">Delete</button></td>
