<?php

/**
 * Description of Product
 *
 * @author michael
 */
class Product {
    private $idProduct;
    private $brand;
    private $model;
    private $price;
    private $color;
    
    public function Product($brand, $model, $price, $color){
        $this->brand = $brand;
        $this->model = $model;
        $this->price = $price;
        $this->color = $color;
    }
    
    public function getIdProduct(){
        return $this->idProduct;
    }
    public function setIdProduct($id){
        $this->idProduct = $id;
    }
    public function getBrand(){
        return $this->brand;
    }
    public function setBrand($brand){
        $this->brand = $brand;
    }
    public function getModel(){
        return $this->model;
    }
    public function setModel($model){
        $this->model = $model;
    }
    public function getPrice(){
        return $this->price;
    }
    public function setPrice($price){
        $this->price = $price;
    }
    public function getColor(){
        return $this->color;
    }
    public function setColor($color){
        $this->color = $color;
    }
    
    
}
