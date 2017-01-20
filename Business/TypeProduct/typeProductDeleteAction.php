<?php
include './typeProductBusiness.php';
include_once  '../../Domain/typeProduct.php';
$idTypeProduct = $_POST['idType'];
if ($_POST['delete']) {
    include './typeProductBusiness.php';    
    if (is_numeric($idTypeProduct)) {
        $typeProductBusiness = new TypeProductBusiness();
        $result = $typeProductBusiness->deleteTypeProduct($idTypeProduct);
        if ($result == true) {
            header('location: ../../Presentation/Product/typeProductInterface.php?success=success');
        } else {
            header('location: ../../Presentation/Product/typeProductInterface.php?errorDelete=errorDelete');
        }
    } else {
        header('location: ../../Presentation/Product/typeProductInterface.php?error=Valor no numerico');
    }
}


