<?php
session_start();
include_once '../database/connection.php';
include_once '../helpers/functions.php';
include_once '../helpers/validations.php';
$errors=[];

$task_id=$_POST['task_id'];
$user_id=$_POST['user_id'];
if($_SESSION['auth']['id']==$user_id){
$sql = $con -> prepare("DELETE FROM TASKS where id = '$task_id' ");
$sql->execute();
header('location:../profile.php');
}
else{
   $errors[]="you can't delete that task";
   $_SESSION['errors']=$errors;
   header('location: ../login.php');
}