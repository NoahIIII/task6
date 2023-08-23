<?php
$errors=[];
session_start();
include_once '../helpers/validations.php';
include_once '../helpers/functions.php';
include_once '../database/connection.php';
if($_SERVER['REQUEST_METHOD']=='POST')
{
  foreach($_POST as $key => $value)
  {
    $$key=sanitization($value);
  }
  if(ValidateEmail($email,$errors) && ValidateName($name,$errors) && ValidatePassword($password,$errors))
  {
    
    $newuser=['name'=> $name,'email'=>$email,'password'=>password_hash($password,PASSWORD_BCRYPT)];
    InsertToDB($con,$newuser);
    $sql=$con->query("SELECT * FROM users where email = '$email'");
    $user=$sql->fetch(PDO::FETCH_ASSOC);
    $_SESSION['auth']=$user;
        header('Location:../profile.php');
  }
  else{

    $_SESSION['errors']=$errors;
    header("Location:../index.php
    ");

  }
}
else
{
 $errors[]='Invalid Method';
 $_SESSION['errors']=$errors;
    header("Location:../index.php
    ");
 
}