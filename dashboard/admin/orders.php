<?php 

include("../../config/config.php");
include("../../class/products_maager.php");



$orderstatistique = new ProductsManager($pdo); 

$stats = $orderstatistique->orderStats();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suivi des Commandes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="dashboard">
        <h1>Suivi des Commandes</h1>

        <!-- Statistiques -->
        <div class="stat-card">
            <div >Total Commandes</div>
            <div ><?php echo htmlspecialchars($stats["totalorder"]); ?></div>
        </div>

        <div class="stat-card">
            <div >Total Ventes</div>
            <div ><?php echo htmlspecialchars($stats["totalvente"]); ?> €</div>
        </div>
    </div>
</body>
</html>
