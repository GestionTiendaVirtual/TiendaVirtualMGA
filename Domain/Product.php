<?php

/**
 * Description of Product
 *
 * @author michael
 */
class Product {
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
    
    function getBrand(){
        return $this->brand;
    }
    function setBrand($brand){
        $this->brand = $brand;
    }
    function getModel(){
        return $this->model;
    }
    function setModel($model){
        $this->model = $model;
    }
    function getPrice(){
        return $this->price;
    }
    function setPrice($price){
        $this->price = $price;
    }
    function getColor(){
        return $this->color;
    }
    function setColor($color){
        $this->color = $color;
    }
    
    
}
