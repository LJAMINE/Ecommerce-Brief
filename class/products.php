<?php

class Products{
    protected $pdo;

    public function __construct($pdo){
        $this->pdo=$pdo;
    }


    public function displayProducts(){
        $stmt=$this->pdo->prepare("SELECT * FROM products");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function createProducts($name,$description,$price,$quantity){
        $stmt=$this->pdo->prepare("INSERT INTO products (name,description,price,quantity) VALUES (?,?,?,?)");
       return $stmt->execute([$name,$description,$price,$quantity]);
    }
}


?>