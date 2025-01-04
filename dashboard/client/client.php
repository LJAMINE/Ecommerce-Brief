<?php
include('../../config/config.php');
include('../../class/products.php');
include('../../class/products_maager.php');


session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'client') {
    header('Location: ../../pages/login.php');
    exit();
} else {
    // echo " client";
}

$productsManager = new ProductsManager($pdo);
$products = $productsManager->displayProducts();

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
            <a href="panier.php"><img src="../../assets/images/shopping-cart.png" alt=""></a>
            <a href="../../function/auth/logout.php"><img src="../../assets/images/logout.png" alt=""></a>
        </div>
    </nav>
    <div class="card-container">
        <?php foreach ($products as $produit) { ?>

            <div class="card">
            <td><img src="<?php echo $produit->getPhoto(); ?>" alt="Product Image" style="width: 100px; height: auto;"></td>
            <div class="card-body">
                    <h3><?php echo $produit->getName() ?></h3>
                    <p><?php echo   $produit->getDescription() ?></p>
                    <h4><?php echo  $produit->getPrice()   ?> $</h4>
                    <a href="../../function/clients/add_to_panier.php?product_id=<?php echo $produit->getId() ?>&quantity=1" class="btn btn-add-to-cart">Add to Cart</a>
                </div>
            </div>



        <?php } ?>
    </div>


</body>

</html>