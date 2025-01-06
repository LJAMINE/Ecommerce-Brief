<?php 
include("../../class/products_maager.php");
include("../../config/config.php");


$productsManager = new ProductsManager($pdo);
$products = $productsManager->affichageProducttotal();

$objectClient=new ProductsManager($pdo);
$clients=$objectClient->affichageClient();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>stats de produits</h1>
<?php echo $products["totalProduits"] ?>


<h1>total de clien</h1>
<?php echo $clients["totalClient"] ?>

</body>
</html>