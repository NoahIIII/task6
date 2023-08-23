<!DOCTYPE html>
<?php 
session_start();
if(!isset($_SESSION['auth']))
{
    header('location:../login.php');
    die;
}
?>
<html>
    <head>
        <title>Validate Your Identity</title>
        <link rel="stylesheet" href="../style/handlesetting.css">
    </head>
    <body>
        <div class="custom-container">
            <p>Please confirm the change and enter your password:</p>
            <form action="handle_email.php" method="POST">
                <input type="password" name="password" placeholder="Enter your password">
                <input type="hidden" name="id" value="<?=$_SESSION['auth']['id']; ?>">
                <input type="hidden" name="new_email" value="<?= $_POST['new_email']; ?>">
                <button class="btn-custom" type="submit">Confirm</button>
            </form>
        </div>
    </body>
</html>
