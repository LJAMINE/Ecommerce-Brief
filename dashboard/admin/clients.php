<?php
include('../../config/config.php');
include('../../class/products_maager.php');

$clientsManagers = new ProductsManager($pdo);
$clients = $clientsManagers->getUser();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients</title>
    <link rel="stylesheet" href="../../assets/style/style4.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div class="icon-container">
        <a href="./admin.php" class="back-icon" title="Go Back">
            <i class="fa-solid fa-right-from-bracket"></i>
        </a>
    </div>
    <h1>Clients</h1>
    <div class="content">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>status</th>
                    <th>switch status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clients as $client) { ?>
                    <tr>
                        <td><?= $client['id']; ?></td>
                        <td><?= htmlspecialchars($client['username']); ?></td>
                        <td><?= htmlspecialchars($client['email']); ?></td>
                        <td><?= $client['created_at']; ?></td>
                        <td><?= $client['status']; ?></td>

                        <td>
                            <a href="../../function/auth/status.php?id=<?php echo $client['id']; ?>" class="button update-button">Switch</a>
                        </td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>