<?php
session_start();
require_once '../config/config.php'; 
require_once '../class/auth.php';

$auth = new Auth($pdo);

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

 
    $role = $auth->login($email, $password);

    if (!$role) {
 echo"bad info";
 
   
    }else{
        header('Location: ../pages/login.php'); 
        exit();
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/style/style.css">
</head>

<body>

    <div class="container">
        <div class="card shadow-lg" style="width: 100%; max-width: 400px;">
            <div class="card-body">
                <h4 class="card-title text-center mb-4">Login</h4>
                
                <form action="login.php" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" required placeholder="Enter your email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required placeholder="Enter your password">
                    </div>
                    <div class="mb-3 text-center">
                        <button type="submit" name="submit" class="btn btn-primary w-100">Login</button>
                    </div>
                </form>
                <p class="text-center text-muted">Don't have an account? <a href="signup.php" class="text-primary">Sign up here</a></p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>