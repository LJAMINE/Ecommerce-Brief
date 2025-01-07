<?php 
include("../../class/products_maager.php");
include("../../config/config.php");

$productsManager = new ProductsManager($pdo);
$products = $productsManager->affichageProducttotal();

$objectClient = new ProductsManager($pdo);
$clients = $objectClient->affichageClient();

$objectOrders = new ProductsManager($pdo);
$order = $objectOrders->affichageorder();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #95A7C8FF, #2a5298);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .dashboard {
            width: 90%;
            max-width: 600px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            backdrop-filter: blur(10px);
            padding: 20px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .dashboard h1 {
            font-size: 2em;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.2);
            margin: 15px 0;
            padding: 20px;
            border-radius: 10px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .stat-card:hover {
            transform: scale(1.05);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.3);
        }

        .stat-title {
            font-size: 1.2em;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .stat-value {
            font-size: 2.5em;
            font-weight: bold;
            color: #ffd700;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <h1>Dashboard Stats</h1>
        
        <div class="stat-card">
            <div class="stat-title">Total Products</div>
            <div class="stat-value"><?php echo htmlspecialchars($products["totalProduits"]); ?></div>
        </div>

        <div class="stat-card">
            <div class="stat-title">Total Clients</div>
            <div class="stat-value"><?php echo htmlspecialchars($clients["totalClient"]); ?></div>
        </div>
        <div class="stat-card">
            <div class="stat-title">Total order</div>
            <div class="stat-value"><?php echo htmlspecialchars($order["totalOrders"]); ?></div>
        </div>
    </div>
</body>
</html>
