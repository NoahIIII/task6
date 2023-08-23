<?php
include_once '../database/connection.php';
include_once '../helpers/functions.php';
include_once '../helpers/validations.php';
session_start();
$errors=[];
if($_SERVER['REQUEST_METHOD']=='POST')
{
    foreach($_POST as $key => $value)
    {
        $$key=sanitization($value);
    }

    if(ValidateEmail($email,$errors) && !empty($password))
    {
        $sql =$con->query("Select * from users where email = '$email' ");   
        $user= $sql->fetch(PDO::FETCH_ASSOC);
        if(!empty($user))
        {
        
            if($user['email']==$email && password_verify($password,$user['password']))
            {
                $_SESSION['auth']=$user;
                header("Location:../profile.php");
                die;
            }
        
        $errors[]='looks like you forgot your email / password, try again';
        $_SESSION['errors']=$errors;
        header('location:../login.php');

        }
        else
        {
            $errors[]='email/password can not be empty';
            $_SESSION['errors']=$errors;
            header('location:../login.php');


        }
    }

}
else
{

  $errors[]='Invalid method';
  $_SESSION['errors']=$errors;
  header('location:../login.php');

}