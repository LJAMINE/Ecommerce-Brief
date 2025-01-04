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
    foreach ($_SESSION['cart'] as $product_id => $item) {

        $stmt = $pdo->prepare("SELECT * FROM products WHERE productid = :id");
        $stmt->execute(['id' => $product_id]);
        $product = $stmt->fetch();

        if ($product) {
            ?>
            <div class="card">
            <td><img src="<?php echo $product['photo'] ?>" alt="Product Image" style="width: 100px; height: auto;"></td>
            <div class="card-body">
                    <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                    <p>Price: <?php echo htmlspecialchars($product['price']); ?> $</p>
                    <p>Quantity: <?php echo htmlspecialchars($item['quantity']); ?></p>
                </div>
            </div>
            <?php
        } else {
            echo "<p>Product not found for ID $product_id.</p>";
        }
    }
    ?>
</div>

</body>
</html>
