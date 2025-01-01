<?php
require("../../config/config.php");
require("../../class/products_maager.php");
$productMaanager = new ProductsManager($pdo);
$product = $productMaanager->getProduct($_GET['id']);

if (isset($_POST['submit'])) {
    $product->setName($_POST['name']);
    $product->setPrice($_POST['price']);
    $product->setQuantity($_POST['quantity']);
    $product->setDescription($_POST['description']);
    $productMaanager->updateProduct($product);
    header("location:../../dashboard/admin/admin.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/style/style3.css">
    <title>Edit Product</title>
  
</head>

<body>
    <form id="productForm" action="" method="POST">
        <h1>Edit Product</h1>
        <label for="productName">Product Name</label>
        <input type="text" id="productName" name="name" value="<?= $product->getName(); ?>" placeholder="Product Name">

        <label for="productPrice">Price</label>
        <input type="number" id="productPrice" name="price" value="<?= $product->getPrice(); ?>" placeholder="Product Price">

        <label for="productQuantity">Quantity</label>
        <input type="number" id="productQuantity" name="quantity" value="<?= $product->getQuantity(); ?>" placeholder="Product Quantity">

        <label for="productDescription">Description</label>
        <textarea id="productDescription" name="description" placeholder="Product Description"><?= $product->getDescription(); ?></textarea>

        <button type="submit" value="submit" name="submit">Submit</button>
    </form>
</body>

</html>
