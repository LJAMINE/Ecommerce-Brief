<?php
include('../../config/config.php');
session_start();

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo " panier is empty.";
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/style/style5.css">
</head>
<style>
    .checkout-summary {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-top: 30px;
        text-align: center;
        width: 80%;
        max-width: 400px;
        margin-left: auto;
        margin-right: auto;
    }

    .checkout-summary h2 {
        font-size: 1.5rem;
        color: #333;
        margin-bottom: 20px;
    }

    .checkout-summary button {
        background-color: #4CAF50;
        color: white;
        padding: 12px 25px;
        font-size: 1.2rem;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .checkout-summary button:hover {
        background-color: #45a049;
        transform: scale(1.05);
    }

    .checkout-summary button:active {
        transform: scale(1);
    }
</style>
<body>
<nav>
    <div>
        <a href="client.php"><img src="../../assets/images/social.png" alt="Social Icon"></a>
    </div>

    <div>
        <a href="panier.php"><img src="../../assets/images/shopping-cart.png" alt="Shopping Cart"></a>
        <a href="client.php"><img src="../../assets/images/logout.png" alt="Logout"></a>
    </div>
</nav>

<h1>Your Cart</h1>
<div class="card-container">
    <?php

    $totalPrice = 0; 

    foreach ($_SESSION['cart'] as $product_id => $item) {

        $stmt = $pdo->prepare("SELECT * FROM products WHERE productid =?");
        $stmt->execute([$product_id]);
        $product = $stmt->fetch();

        if ($product) {

            $itemTotal = $product['price'] * $item['quantity']; 
            $totalPrice += $itemTotal; // Add the item total to the cart total
            ?>
            <div class="card">
                <img src="<?php echo $product['photo'] ?>" alt="Product Image" style="width: 100px; height: auto;">
                <div class="card-body">
                    <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                    <p>Price: <?php echo htmlspecialchars($product['price']); ?> $</p>
                    <p>Quantity: <?php echo htmlspecialchars($item['quantity']); ?></p>
                    
                    <p>Total: <?php echo htmlspecialchars($itemTotal); ?> $</p>
                </div>
            </div>
            <?php
        } else {
            echo "<p>product not found $product_id.</p>";
        }
    }
    ?>
</div>
<div class="checkout-summary">
    <h2>Total Price: <?php echo $totalPrice; ?> $</h2>

    <form action="../../function/orders/checkout.php" method="post">
        <button type="submit">confirm order</button>
    </form>
</div>

</body>
</html>
