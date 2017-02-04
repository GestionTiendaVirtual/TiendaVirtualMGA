<?php

include '../../Domain/typeProduct.php';
include './typeProductBusiness.php';
$nameTypeProduct = $_POST['txtNameTypeProductInsert'];


if (strlen($nameTypeProduct) >= 2) {

    $typeProduct = new TypeProduct($nameTypeProduct);
    $typeProductBusiness = new TypeProductBusiness();
    $exist = $typeProductBusiness->isExist($nameTypeProduct);
    if ($exist == "NoExiste") {
        header('location: ../../Presentation/TypeProduct/typeProductInterface.php?errorInsert=errorExist');
    } else {
        $result = $typeProductBusiness->insertTypeProduct($typeProduct);
        if ($result == true) {
            header('location: ../../Presentation/TypeProduct/typeProductInterface.php?' . $exist);
        } else {
            header('location: ../../Presentation/TypeProduct/typeProductInterface.php?errorInsert=errorInsert');
        }
    }
} else {
    header('location: ../../Presentation/TypeProduct/typeProductInterface.php?error=errorSize');
}
