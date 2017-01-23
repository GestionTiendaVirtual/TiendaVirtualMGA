<?php
include './ProductBusiness.php';
$idProduct = $_POST['idProduct'];

if (is_numeric($idProduct)) {    
    
    $productBusiness = new ProductBusiness();
    $result = $productBusiness->deleteProduct($idProduct);
    if($result == true){
        header('location: ../Presentation/ProductDelete.php?success=success');
    }else{
        header('location: ../Presentation/ProductDelete.php?errorDelete=errorDelete');
    }
    
} else {
    header('location: ../Presentation/ProductUpdate.php?error=errorData');
}

