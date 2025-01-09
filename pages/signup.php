<?php
session_start();
require_once '../config/config.php';
require_once '../class/auth.php';

$auth = new Auth($pdo);

if (isset($_POST['submit'])) {
    $username = htmlspecialchars(trim($_POST['username']));
    $email = trim(($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = trim($_POST['password']);

    if (empty($username) || empty($email) || empty($password)) {

        echo "<div id='alert' class='alert alert-danger'>the inputs is empty </div>";
    } else {

        $result = $auth->register($username, $email, $password);
        echo "<div id='alert' class='alert alert-success'>succes registeration </div>";

        echo $result;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/style/style.css">
</head>

<body>

    <div class="container">
        <div class="card shadow-lg" style="width: 100%; max-width: 400px;">
            <div class="card-body">
                <h4 class="card-title text-center mb-4">Sign Up</h4>
                <?php if (!empty($message)) echo $message; ?>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">username</label>
                        <input type="text" class="form-control" id="name" name="username" placeholder="Enter your username">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Create a password">
                    </div>


                    <div class="mb-3 text-center">
                        <button type="submit" name="submit" class="btn btn-primary w-100">Sign Up</button>
                    </div>
                </form>
                <p class="text-center text-muted">Already have an account? <a href="login.php" class="text-primary">Login here</a></p>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const alert = document.getElementById('alert');
            if (alert) {
                setTimeout(() => {
                    alert.style.display = "none";
                }, 2500);
            }
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>