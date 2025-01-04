<?php
include('../../config/config.php');

session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'client') {
    header('Location: ../../pages/login.php');
    exit();
} else {
    // echo "client";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Dashboard</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../assets/style/style5.css">
</head>
<body>

<nav>
    <div>
        <a href=""><img src="../../assets/images/social.png" alt=""></a>
    </div>
    
<div>
<a href="panier.php"><i class="fa-solid fa-cart-shopping"></i></a>
<a clas href="../../function/auth/logout.php">logout</a>
</div>
</nav>

    <div class="card-container">
        <div class="card">
            <img src="https://via.placeholder.com/300" alt="Product Image">
            <div class="card-body">
                <h3>Product Name</h3>
                <p>Short description about the product goes here.</p>
                <a href="#" class="btn btn-add-to-cart">Add to Cart</a>
            </div>
        </div>

        <div class="card">
            <img src="https://via.placeholder.com/300" alt="Product Image">
            <div class="card-body">
                <h3>Another Product</h3>
                <p>Another short description goes here.</p>
                <a href="#" class="btn btn-add-to-cart">Add to Cart</a>
            </div>
        </div>
        <div class="card">
            <img src="https://via.placeholder.com/300" alt="Product Image">
            <div class="card-body">
                <h3>Another Product</h3>
                <p>Another short description goes here.</p>
                <a href="#" class="btn btn-add-to-cart">Add to Cart</a>
            </div>
        </div>   <div class="card">
            <img src="https://via.placeholder.com/300" alt="Product Image">
            <div class="card-body">
                <h3>Another Product</h3>
                <p>Another short description goes here.</p>
                <a href="#" class="btn btn-add-to-cart">Add to Cart</a>
            </div>
        </div>   <div class="card">
            <img src="https://via.placeholder.com/300" alt="Product Image">
            <div class="card-body">
                <h3>Another Product</h3>
                <p>Another short description goes here.</p>
                <a href="#" class="btn btn-add-to-cart">Add to Cart</a>
            </div>
        </div>   <div class="card">
            <img src="https://via.placeholder.com/300" alt="Product Image">
            <div class="card-body">
                <h3>Another Product</h3>
                <p>Another short description goes here.</p>
                <a href="#" class="btn btn-add-to-cart">Add to Cart</a>
            </div>
        </div>
    </div>

</body>
</html>
