<?php
include('../../config/config.php');
include('../../class/products.php');

$newProducts=new Products($pdo);

if ($_SERVER['REQUEST_METHOD']=="POST") {

    $name=$_POST['name'];
    $description=$_POST['description'];
    $price=$_POST['price'];
    $quantity=$_POST['quantity'];
    
    $newProducts->createProducts($name,$description,$price,$quantity);
    header("location:admin.php");
    }else{
        echo 'bad';
    }


$Row=$newProducts->displayProducts();
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
    <style>
        body {
            font-family: 'Inter', Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            background-color: #f0f4f4;
            line-height: 1.6;
            color: #333;
            overflow-y: scroll;
        }

   
        .sidebar {
            width: 180px;
            background-color: #79AEE4FF;
            color: white;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 30px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            position: fixed;
            left: 0;
            top: 0;
        }

        .sidebar button {
            background-color: #2777ADFF;
            color: white;
            border: none;
            padding: 10px 20px;
            margin: 10px 0;
            cursor: pointer;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s ease;
            width: 100px;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .sidebar button:hover {
            background-color: #2980b9;
            transform: translateY(-3px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .content {
            margin-left: 180px;
            padding: 20px;
        }

        .drawer {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #ffffff;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            width: 800px;
            max-height: 90vh;
            overflow-y: auto;
            z-index: 1000;
        }

        .drawer.active {
            display: block;
        }

        table {
            width: 100%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #ffffff;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            border-radius: 10px;
            overflow: hidden;
        }

        th,
        td {
            padding: 10px;
            text-align: center;
            border: 1px solid #e0e0e0;
        }

        th {
            font-size: 12px;
        }

        tbody tr:hover {
            background-color: #f1f1f1;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        form #productForm {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        form label {
            font-size: 14px;
            color: #34495e;
            margin-bottom: 5px;
            font-weight: 600;
        }

        form input,
        form textarea,
        form button {
            width: 100%;
            padding: 12px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        form input:focus,
        form textarea:focus {
            border-color: #3498db;
            outline: none;
            box-shadow: 0 0 8px rgba(52, 152, 219, 0.2);
        }

        #closeme {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            margin-bottom: 15px;
            border-radius: 5px;
            font-size: 14px;
        }

        #closeme:hover {
            background-color: #c0392b;
        }

        form button[type="submit"] {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 12px;
            cursor: pointer;
            border-radius: 8px;
            font-size: 16px;
            text-transform: uppercase;
            font-weight: 600;
        }

        form button[type="submit"]:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <button id="addProductButton">Add Product</button>
        <button id="viewClientsButton"> Clients</button>
        <button id="viewOrdersButton"> Orders</button>
        <button id="viewStatsButton">stats</button>
        <button id="logoutButton">Logout</button>
    </div>

    <div class="content">
        <h1>Admin Dashboard</h1>

        <div id="pruit table">

            <table>
                <thead>
                    <tr>
                        <th>product name</th>
                        <th>description</th>
                        <th>price</th>
                        <th> quantity</th>
                        <th>update</th>
                        <th>delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($Row as $newRow) {?>
                    <tr>
                        <td><?php echo $newRow['name'] ?></td>
                        <td><?php echo $newRow['description'] ?></td>
                        <td><?php echo $newRow['price'] ?></td>
                        <td><?php echo $newRow['quantity'] ?></td>
                        <td>update</td>
                        <td>delete</td>

                    </tr>
                    <?php } ?>
                </tbody>
            </table>


        </div>

     
    </div>

    <!-- Add Product Drawer -->
    <div class="drawer" id="productDrawer">
        <button id="closeme">Close</button>
        <form id="productForm" action="" method="POST">
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