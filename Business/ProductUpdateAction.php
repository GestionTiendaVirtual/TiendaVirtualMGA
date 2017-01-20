<?php

include '../Domain/Product.php';
include './ProductBusiness.php';
$idProduct = $_POST['idProduct'];
$brand = $_POST['txtBrand'];
$name = $_POST['txtName'];
$model = $_POST['txtModel'];
$price = $_POST['txtPrice'];
$color = $_POST['txtColor'];
$description = $_POST['txtDescription'];


if (strlen($brand) >= 2 && strlen($model) >= 2 && strlen($color) >= 2 
        && is_numeric($price) && strlen($description) >= 2) {
    
    $product = new Product($brand,$model,$price,$color,$description,$name);
    $product->setIdProduct($idProduct);
    $productBusiness = new ProductBusiness();
    $result = $productBusiness->updateProduct($product);
    if($result == true){
        header('location: ../Presentation/ProductUpdate.php?success=success');
    }else{
        header('location: ../Presentation/ProductUpdate.php?errorUpdate=errorUpdate');
    }
    
} else {
    header('location: ../Presentation/ProductUpdate.php?error=errorData');
}