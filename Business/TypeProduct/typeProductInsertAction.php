<?php

include '../../Domain/typeProduct.php';
include './typeProductBusiness.php';
$nameTypeProduct = $_POST['txtNameTypeProductInsert'];


if (strlen($nameTypeProduct) >= 2) {

    $typeProduct = new TypeProduct($nameTypeProduct);
    $typeProductBusiness = new TypeProductBusiness();
    $exist = $typeProductBusiness->isExist($nameTypeProduct);
    if ($exist == 'Existe') {
        header('location: ../../Presentation/TypeProduct/typeProductInterface.php?errorExist');
    } else {
        $result = $typeProductBusiness->insertTypeProduct($typeProduct);
        if ($result == true) {
            header('location: ../../Presentation/TypeProduct/typeProductInterface.php?insert');
        } else {
            header('location: ../../Presentation/TypeProduct/typeProductInterface.php?errorInsert');
        }
    }
} else {
    header('location: ../../Presentation/TypeProduct/typeProductInterface.php?errorSize');
}
