<?php
include('../../config/config.php');
include('../../class/products.php');
include('../../class/products_maager.php');

session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'client') {
    header('Location: ../../pages/login.php');
    exit();
}

if (empty($_SESSION['cart'])) {
    echo "Your cart is empty.";
    exit();
}

// total price
$total = 0;
foreach ($_SESSION['cart'] as $item) {
    $total += $item['quantity'] * $item['price'];
}

// create the order
$productsManager = new ProductsManager($pdo);
$orderId = $productsManager->createOrder($_SESSION['user_id'], $total);

// save the order item
$productsManager->addOrderItems($orderId, $_SESSION['cart']);

// emty the cart
unset($_SESSION['cart']);

// redirect to a confirmation page or display a success message
header('Location: confirmation.php');
exit();
?>
