<?php

require_once('products.php');

class ProductsManager {
    protected $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }


    //product func----------------------------------------------------------------------

    public function displayProducts() {
        $stmt = $this->pdo->prepare("SELECT * FROM products where status!='deleted'");
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


public function getProduct($id){
    $stmt = $this->pdo->prepare("SELECT * FROM products WHERE productid = :id");
    $stmt->execute([
        ':id' => $id
    ]);
    $product = $stmt->fetch();
    return new Product($product['productid'], $product['name'], $product['description'], $product['price'], $product['quantity']);
}

    public function deleteProduct($id) {
        $stmt = $this->pdo->prepare("UPDATE products SET status ='deleted' WHERE productid = ?");
        return $stmt->execute([$id]);
    }

    public function updateProduct($product) {
        $stmt = $this->pdo->prepare("UPDATE products SET name = ?, description = ?, price = ?, quantity = ? WHERE productid = ?");
        return $stmt->execute([
            $product->getName(),
            $product->getDescription(),
            $product->getPrice(),
            $product->getQuantity(),
            $product->getId()
        ]);
    }


    //clients-----------------------------------------------------------------------

    public function getUser(){
        $stmt=$this->pdo->prepare("SELECT * FROM users where role='client'");
        $stmt->execute([]);
        return $stmt->fetchAll();

    }

}

?>
