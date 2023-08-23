<!DOCTYPE html>
<?php 
session_start();
if(!isset($_SESSION['auth']))
{
    header('location:login.php');
    die;
}
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Setting</title>
        <!-- Only one link to Bootstrap CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="style/setting.css">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="d-flex justify-content-center align-items-center vh-100">
            <div class="custom-container">
                <a href="profile.php" class="profile-btn">My Profile</a>
                <?php if (!empty($_SESSION['errors'])): ?>
                    <?php foreach ($_SESSION['errors'] as $error): ?>
                        <div class="alert alert-danger text-center"><?= $error; ?></div>
                    <?php endforeach; ?>
                    <?php unset($_SESSION['errors']); ?>
                <?php endif; ?>
                <!-- Changed the input type to email for appropriate validation and keyboard on mobile devices -->
                <form action="setting_handle/change_email.php" method="POST" class="mb-4">
                    <div class="form-group">
                        <input type="email" class="form-control" name="new_email" value="<?= $_SESSION['auth']['email']; ?>" placeholder="Enter your new email">
                    </div>
                    <input type="hidden" name="id" value="<?= $_SESSION['auth']['id']; ?>">
                    <button type="submit" class="btn btn-custom">Change My Email</button>
                </form>
                <hr>
                <form action="setting_handle/change_password.php" method="POST">
                    <div class="form-group">
                        <input type="password" class="form-control" name="new_password" placeholder="Enter your new password">
                    </div>
                    <input type="hidden" name="id" value="<?= $_SESSION['auth']['id']; ?>">
                    <button type="submit" class="btn btn-custom">Change My Password</button>
                </form>
            </div>
        </div>

        <!-- Bootstrap JS & jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>
