<?php
function sanitization($input)
{
    return trim(HTMLSPECIALCHARS(htmlentities($input)));
}
function InsertToDB($con,$array)
{
    $sql = $con->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
    $sql->bindParam(':name', $array['name']);
    $sql->bindParam(':email', $array['email']);
    $sql->bindParam(':password', $array['password']);
    $sql->execute();
}
