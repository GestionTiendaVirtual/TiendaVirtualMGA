<?php

include '../Domain/Product.php';
include './ProductBusiness.php';
$brand = $_POST['txtBrand'];
$name = $_POST['txtName'];
$model = $_POST['txtModel'];
$price = $_POST['txtPrice'];
$color = $_POST['txtColor'];
$description = $_POST['txtDescription'];

if (strlen($name) >= 2 && strlen($description) >= 2 && strlen($brand) >= 2 && strlen($model) >= 2 && strlen($color) >= 2 && is_numeric($price)) {
    
    $product = new Product($brand,$model,$price,$color,$description,$name);
    $productBusiness = new ProductBusiness();
    $result = $productBusiness->insertProduct($product);
    if($result == true){
        header('location: ../Presentation/ProductCreate.php?success=success');
    }else{
        header('location: ../Presentation/ProductCreate.php?errorInsert=errorInsert');
    }
    
} else {
    header('location: ../Presentation/ProductCreate.php?error=errorData');
}

