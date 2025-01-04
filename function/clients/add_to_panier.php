<?php

session_start();

if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "client") {
    header("location:../../pages/loging.php");
    exit();
}

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];//url product_id=url li f client.php href
    $quantity = isset($_GET['quantity']) ? $_GET['quantity'] : 1;

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

//check if product is in the panier 
    if (isset($_SESSION['cart'][$product_id])) {
        // zidf  quantity ila product kayn deja f panier
        // example
        // $_SESSION['cart'][1] = ['quantity' => 2];

        $_SESSION['cart'][$product_id]['quantity'] += $quantity;
    } else {
//ila makanch deja chi produit zido f panier
        $_SESSION['cart'][$product_id] = [
            'quantity' => $quantity,
        ];
    }

    header('Location: ../../dashboard/client/panier.php');
    exit();
}

?>
