<?php
include './typeProductBusiness.php';
include '../Domain/typeProduct.php';


$idTypeProduct = $_POST['idTypeProduct'];
$nameTypeProduct = $_POST['txtNameTypeProductUpdate'];


if (is_numeric($idTypeProduct) && strlen($nameTypeProduct) >= 2) {
    
    $typeProduct = new TypeProduct($nameTypeProduct);
    $typeProduct->setIdProduct($idTypeProduct);
    $typeProductBusiness = new TypeProductBusiness();
    $result = $typeProductBusiness->updateTypeProduct($typeProduct);
    if($result == true){
        header('location: ../../Presentation/Product/typeProductInterface.php?success=success');
    }else{
        header('location: ../../Presentation/Product/typeProductInterface.php?errorUpdate=errorUpdate');
    }
    
} else {
    header('location: ../../Presentation/Product/typeProductInterface.php?error=errorData');
}