<?php
session_start();
include_once '../database/connection.php';
include_once '../helpers/functions.php';
include_once '../helpers/validations.php';
$suc=[];
$errors=[];
if($_SERVER['REQUEST_METHOD']='POST'){
$email=sanitization($_POST['new_email']);
$user_password=sanitization($_POST['password']);
$id=$_POST['id'];
if(ValidateEmail($email,$errors) )
{
 if(ConfirmPssword($con,$user_password,$id))
 {
   $sql = $con -> prepare("UPDATE USERS set email = '$email' where id = $id ; ");
   $sql->execute();
   $suc[]='email changed ';
   $_SESSION['suc']=$suc;
   $_SESSION['auth']['email']=$email;
   header('location:../profile.php');
 }
 else{
    $errors[]='uncorrect password';
    $_SESSION['errors']=$errors;

    header('location:../setting.php');
 }
}
else {
    
    $_SESSION['errors']=$errors;
    header('location:../setting.php');
}
}
else{
    $errors[]='invalid method';
    $_SESSION['errors']=$errors;
    header('location:../setting.php');
}
