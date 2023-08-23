<!DOCTYPE html>
<?php session_start(); ?>
<?php include_once 'helpers/functions.php'; ?>
<?php 
if(isset($_SESSION['auth']))
{
    header('profile.php');
    die;
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="css/bootstrap.min.css" rel='stylesheet'>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"  type = "text/css"href="style/register.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 mx-auto">
                <div class="register-container">
                    <h2 class="text-center">Register</h2>
                    <?php if (!empty($_SESSION['errors'])): ?>
                        <?php foreach ($_SESSION['errors'] as $error): ?>
                            <div class="alert alert-danger text-center"><?= $error; ?></div>
                        <?php endforeach; ?>
                        <?php unset($_SESSION['errors']); ?>
                    <?php endif; ?>
                    <form action="control/registercontrol.php" method="post">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Write your name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Write your email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Write your password" required>
                        </div>
                        <button type="submit" class="btn btn-block register-button">Create New Account</button>
                        
                    </form>
                    <div class="text-center login-link">
                        Already have an account? <a href="login.php">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
