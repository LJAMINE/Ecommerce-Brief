<?php
include_once('../../config/config.php');


session_start();

if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "client") {
    header("location:../../pages/loging.php");
    exit();
}

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];//url product_id=url li f client.php href
    $quantity = isset($_GET['quantity']) ? $_GET['quantity'] : 1;



    //ila session cart is not seeet initialise b empty array
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $stmt = $pdo->prepare("SELECT * FROM products WHERE productid = :product_id");
    $stmt->execute(['product_id' => $product_id]);
    $product = $stmt->fetch();



    if ($product) {
        // ila  product already in the cart
        if (isset($_SESSION['cart'][$product_id])) {
            // ila  product already in cart, incrementer qte
            $_SESSION['cart'][$product_id]['quantity'] += $quantity;
        } else {
            // if product is not in the cart, add it with quantity and price
            $_SESSION['cart'][$product_id] = [
                'quantity' => $quantity,
                'price' => $product['price'],  // store the qte et prix 
            ];
        }

        header('Location: ../../dashboard/client/panier.php');
        exit();
    } else {
        echo "Product not found.";
    }
}

?>
