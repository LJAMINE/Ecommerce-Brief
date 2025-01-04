<?php
include('../../config/config.php');
include('../../class/products.php');
include('../../class/products_maager.php');

session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../../pages/login.php');
    exit();
} else {
    // echo "admin";
}


$productsManager = new ProductsManager($pdo);
$products = $productsManager->displayProducts();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../assets/style/style2.css">
</head>

<body>
    <div class="sidebar">

        <div>
            <a href=""><img src="../../assets/images/user-setting.png" alt=" Icon" style="height: 60px;width: 60px;"></a>
        </div>
        <button id="addProductButton">Add Product</button>
        <button id="viewClientsButton"> Clients</button>
        <button id="viewOrdersButton"> Orders</button>
        <button id="viewStatsButton">stats</button>

        <!-- <button id="logoutButton">Logout</button> -->
        <a href="../../function/auth/logout.php"><img src="../../assets/images/logout.png" style="height:60px;width: 60px;" alt=""></i>
        </a>

    </div>

    <div class="content">
        <!-- <h1>Admin Dashboard</h1> -->

        <div id="pruit table">

            <table>
                <thead>
                    <tr>
                        <th>photo</th>
                        <th>product name</th>
                        <th>description</th>
                        <th>price</th>
                        <th> quantity</th>
                        <th>update</th>
                        <th>delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $produit) { ?>
                        <tr>
                            <td><img src="<?php echo $produit->getPhoto(); ?>" alt="Product Image" style="width: 100px; height: auto;"></td>
                            <td><?php echo $produit->getName() ?></td>
                            <td><?php echo   $produit->getDescription() ?></td>
                            <td><?php echo  $produit->getPrice()   ?></td>
                            <td><?php echo  $produit->getQuantity() ?></td>
                            <td>
                                <a href="../../function/product/update.php?id=<?php echo $produit->getId(); ?>" class="button update-button">Update</a>
                            </td>
                            <td>
                                <form action="../../function/product/delete.php" method="post">
                                    <input type="hidden" name="id_delete" value="<?php echo $produit->getId() ?>">
                                    <input type="submit" name="delete" value="Delete" class="button delete-button">
                                </form>
                            </td>


                        </tr>
                    <?php } ?>
                </tbody>
            </table>


        </div>


    </div>

    <!-- Add Product Drawer -->
    <div class="drawer" id="productDrawer">
        <button id="closeme">Close</button>
        <form id="productForm" action="../../function/product/create.php" method="POST">

            <label for="">photo</label>
            <input type="text" id="photo" name="photo" placeholder="Product Name">

            <label for="productName">Product Name</label>
            <input type="text" id="productName" name="name" placeholder="Product Name">

            <label for="productPrice">Price</label>
            <input type="number" id="productPrice" name="price" placeholder="Product Price">

            <label for="productQuantity">Quantity</label>
            <input type="number" id="productQuantity" name="quantity" placeholder="Product Quantity">

            <label for="productDescription">Description</label>
            <textarea id="productDescription" name="description" placeholder="Product Description"></textarea>

            <button type="submit" value="submit" name="submit">Submit</button>
        </form>
    </div>


</body>
<script src="../../js/main.js"></script>

</html>