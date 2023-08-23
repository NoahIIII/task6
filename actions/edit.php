<?php
session_start();
include_once '../database/connection.php';
include_once '../helpers/functions.php';
include_once '../helpers/validations.php';
$errors=[];
$task_id=$_POST['task_id'];
$new_task=$_POST['new_task'];
$sql = $con -> prepare("UPDATE TASKS SET TASK = '$new_task' where id = $task_id;");
$sql->execute();
header('location:../profile.php');
