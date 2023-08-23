<!DOCTYPE html>
<?php session_start();?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="css/bootstrap.min.css" rel='stylesheet'>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel = "stylesheet"type = "text/css" href = "style/login.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 mx-auto">
                <div class="login-container">
                    <h2 class="text-center">Login</h2>
                    <?php if (!empty($_SESSION['errors'])): ?>
                        <?php foreach ($_SESSION['errors'] as $error): ?>
                            <div class="alert alert-danger text-center"><?= $error; ?></div>
                        <?php endforeach; ?>
                        <?php unset($_SESSION['errors']); ?>
                    <?php endif; ?>
                    <form action="control/logincontrol.php" method="post">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name ="email" class="form-control" placeholder="Enter your email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                        </div>
                        <button type="submit" class="btn btn-block login-button">Login</button>
                    </form>
                    <div class="text-center register-link">
                        Don't have an account? <a href="index.php">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

