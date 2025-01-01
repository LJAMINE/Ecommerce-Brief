<?php

class ProductsManager {
    protected $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function displayProducts() {
        $stmt = $this->pdo->prepare("SELECT * FROM products");
        $stmt->execute();
        $rows = $stmt->fetchAll();

        $products = [];
        foreach ($rows as $row) {
            $products[] = new Product($row['productid'], $row['name'], $row['description'], $row['price'], $row['quantity']);
        }

        return $products;
    }

    public function createProduct($name, $description, $price, $quantity) {
        $stmt = $this->pdo->prepare("INSERT INTO products (name, description, price, quantity) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$name, $description, $price, $quantity]);
    }




    public function deleteProduct($id) {
        $stmt = $this->pdo->prepare("DELETE FROM products WHERE productid = ?");
        return $stmt->execute([$id]);
    }
}

?>
