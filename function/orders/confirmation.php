<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
            margin: 0;
        }

        .confirmation-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 500px;
            width: 100%;
        }

        .confirmation-container h1 {
            font-size: 2rem;
            color: #4CAF50;
        }

        .confirmation-container p {
            font-size: 1rem;
            margin: 16px 0;
            color: #333;
        }

        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            margin-top: 20px;
        }

        .btn:hover {
            background-color: #45a049;
        }

        .icon {
            font-size: 50px;
            color: #4CAF50;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <div class="confirmation-container">
        <div class="icon">
            <i class="fas fa-check-circle"></i>
        </div>
        <h1>Order Successful!</h1>
        <p>Your order has been successfully placed</p>
        <a href="../../dashboard/client/client.php" class="btn">Go to Dashboard</a>
    </div>

</body>

</html>
