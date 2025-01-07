<?php

require_once('products.php');

class ProductsManager
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }


    //product func----------------------------------------------------------------------

    public function displayProducts()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM products where status!='deleted'");
        $stmt->execute();
        $rows = $stmt->fetchAll();

        $products = [];
        foreach ($rows as $row) {
            $products[] = new Product($row['productid'], $row['name'], $row['photo'], $row['description'], $row['price'], $row['quantity']);
        }

        return $products;
    }

    public function createProduct($name, $description, $price, $quantity)
    {
        $stmt = $this->pdo->prepare("INSERT INTO products (name, description, price, quantity) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$name, $description, $price, $quantity]);
    }


    public function getProduct($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM products WHERE productid = :id");
        $stmt->execute([
            ':id' => $id
        ]);
        $product = $stmt->fetch();
        return new Product($product['productid'], $product['name'], $product['photo'], $product['description'], $product['price'], $product['quantity']);
    }

    public function deleteProduct($id)
    {
        $stmt = $this->pdo->prepare("UPDATE products SET status ='deleted' WHERE productid = ?");
        return $stmt->execute([$id]);
    }

    public function updateProduct($product)
    {
        $stmt = $this->pdo->prepare("UPDATE products SET name = ?,photo = ?, description = ?, price = ?, quantity = ? WHERE productid = ?");
        return $stmt->execute([
            $product->getName(),
            $product->getPhoto(),
            $product->getDescription(),
            $product->getPrice(),
            $product->getQuantity(),
            $product->getId()
        ]);
    }


    //---------------requette






    //order-------------------------------------------
    public function createOrder($userId, $total)
    {
        // Insert the order
        $stmt = $this->pdo->prepare("INSERT INTO orders (id, total, orderdate) VALUES (:user_id, :total, NOW())");
        $stmt->execute(['user_id' => $userId, 'total' => $total]);


        $orderId = $this->pdo->lastInsertId();

        return $orderId;
    }
    public function addOrderItems($orderId, $cart)
    {
        // ineert in productmanager table
        $stmt = $this->pdo->prepare("INSERT INTO productmanager (orderid, productid, qte, pricetotal) VALUES (:order_id, :product_id, :quantity, :price)");

        foreach ($cart as $productId => $item) {

            $product = $this->getProduct($productId);

            if ($product->getQuantity() < $item['quantity']) {
                throw new Exception("no stock for product ");
            }


            $stmt->execute([
                'order_id' => $orderId,
                'product_id' => $productId,
                'quantity' => $item['quantity'],
                'price' => $item['quantity'] * $item['price'],
            ]);

            // quantty
            $this->updateProductQuantity($productId, $item['quantity']);
        }
    }

    // mise jour quantity apres an order
    public function updateProductQuantity($productId, $quantity)
    {
        $stmt = $this->pdo->prepare("UPDATE products SET quantity = quantity - :quantity WHERE productid = :product_id");
        $stmt->execute([
            'quantity' => $quantity,
            'product_id' => $productId,
        ]);
    }







    //clients-----------------------------------------------------------------------

    public function getUser()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users where role='client'");
        $stmt->execute([]);
        return $stmt->fetchAll();
    }




    //affichage des produit tootall

    public function affichageProducttotal()
    {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) AS totalProduits FROM products WHERE status='active'");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    //affichage des client tootall

    public function affichageClient()
    {

        $stmt = $this->pdo->prepare("SELECT COUNT(*) AS totalClient FROM users");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //affichage des order tootall

    public function affichageorder()
    {

        $stmt = $this->pdo->prepare("SELECT COUNT(*) AS totalOrders FROM orders");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

public function orderStats()
{
    $stmt = $this->pdo->prepare("SELECT COUNT(*) AS totalorder, SUM(total) AS totalvente FROM orders");
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

}

