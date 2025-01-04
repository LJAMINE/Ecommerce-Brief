<?php

class Product
{
    private $id;
    private $name;

    private $photo;
    private $description;
    private $price;
    private $quantity;

    public function __construct($id, $name,$photo, $description, $price, $quantity)
    {
        $this->id = $id;
        $this->name = $name;
        $this->photo = $photo;
        $this->description = $description;
        $this->price = $price;
        $this->quantity = $quantity;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPhoto()
    {
        return $this->photo;
    }
    public function getDescription()
    {
        return $this->description;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setphoto($photo)
    {
        $this->photo = $photo;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }
}
