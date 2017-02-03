<?php
include '../../Domain/typeProduct.php';
include './typeProductBusiness.php';
$nameTypeProduct = $_POST['txtNameTypeProductInsert'];


if (strlen($nameTypeProduct) >= 2) {
    
    $typeProduct= new TypeProduct($nameTypeProduct);
    $typeProductBusiness = new TypeProductBusiness();
    $result = $typeProductBusiness->insertTypeProduct($typeProduct);
    if($result == true){
        header('location: ../../Presentation/TypeProduct/typeProductInterface.php?success=success');
    }else{
        header('location: ../../Presentation/TypeProduct/typeProductInterface.php?errorInsert=errorInsert');
    }
    
} else {
    header('location: ../../Presentation/TypeProduct/typeProductInterface.php?error=errorData'.strlen($nameTypeProduct));
}
