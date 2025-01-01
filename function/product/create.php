<?php


include('../../config/config.php');
include("../../class/products_maager.php");

$productsManager = new ProductsManager($pdo);


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $productsManager->createProduct($name, $description, $price, $quantity);
    header('location:../../dashboard/admin/admin.php');
}

?>