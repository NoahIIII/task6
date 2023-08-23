<?php
session_start();
include_once '../database/connection.php';
include_once '../helpers/functions.php';
include_once '../helpers/validations.php';
$errors=[];
$suc=[];
if($_SERVER['REQUEST_METHOD']='POST'){
$user_password=sanitization($_POST['user_password']);
$new_password=sanitization($_POST['new_password']);
$id=$_POST['id'];
if(ValidatePassword($new_password,$errors) )
{
 if(ConfirmPssword($con,$user_password,$id))
 {
    $new_password=password_hash($user_password,PASSWORD_BCRYPT);
   $sql = $con -> prepare("UPDATE USERS set password = '$new_password' where id = $id ; ");
   $sql->execute();
   $suc[]='password changed';
  $_SESSION['suc']=$suc;
  $_SESSION['auth']['password']=$new_password;

  header('location:../profile.php');
 }
 else{
    $errors[]='uncorrect password';
 }
}
else {
    
    $_SESSION['errors']=$errors;
    header('location:../setting.php');
    die;
}
}
else{
    $errors[]='invalid method';
    $_SESSION['errors']=$errors;
    header('location:../setting.php');
}
