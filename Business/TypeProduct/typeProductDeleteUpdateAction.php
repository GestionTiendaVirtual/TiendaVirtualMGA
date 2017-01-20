<?php
include './typeProductBusiness.php';
include '../../Domain/typeProduct.php';

$idTypeProduct = $_POST['idType'];
$nameTypeProduct = $_POST['txtNameType'];

if ($_POST['delete']) {
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

if ($_POST['update']) {
    if (is_numeric($idTypeProduct) && strlen($nameTypeProduct) >= 2) {
        $typeProduct = new typeProduct($nameTypeProduct);
        $typeProduct->setIdProduct($idTypeProduct);
        $typeProductBusiness = new TypeProductBusiness();
        $result = $typeProductBusiness->updateTypeProduct($typeProduct);
        if ($result == true) {
            header('location: ../../Presentation/Product/typeProductInterface.php?success=success');
        } else {
            header('location: ../../Presentation/Product/typeProductInterface.php?errorUpdate=errorUpdate');
        }
    } else {
        header('location: ../../Presentation/Product/typeProductInterface.php?error=errorData');
    }
}
