<?php

include '../Domain/Product.php';
include './ProductBusiness.php';

if (isset($_POST['optionCreate'])) {

    $brand = $_POST['txtBrand'];
    $name = $_POST['txtName'];
    $model = $_POST['txtModel'];
    $price = $_POST['txtPrice'];
    $color = $_POST['txtColor'];
    $count = $_POST['count'];
    $typeProduct = $_POST['cbTypeProduct'];
    $description = $_POST['txtDescription'];
    $price = str_replace(",", "", $price);

    $arrayImages = [];
    $flag = false;
    for ($i = 0; $i <= $count; $i++) {

        $fileImage = 'fileImage' . $i;
        if ($_FILES[$fileImage]["error"] > 0) {
            header('location: ../Presentation/ProductCreate.php?error=errorData');
        } else {

            $allowed = array("image/jpg", "image/jpeg", "image/gif", "image/png");
            $limit_kb = 1000;

            if (in_array($_FILES[$fileImage]['type'], $allowed) &&
                    $_FILES[$fileImage]['size'] <= $limit_kb * 1024) {

                $path = "../images/" . $_FILES[$fileImage]['name'];

                /* verifiacion imagen a isertar no exista */
                if (!file_exists($path)) {
                    /* verificacion imagen hata movido a la ruta de destino */
                    $result = @move_uploaded_file($_FILES[$fileImage]["tmp_name"], $path);
                    if ($result) {
                        array_push($arrayImages, $path);
                        $flag = true;
                    }
                } else {
                    header('location: ../Presentation/ProductCreate.php?errorExis=error');
                }
            } else {
                header('location: ../Presentation/ProductCreate.php?errorSize=error');
            }
        }
    }
    if (strlen($name) >= 2 && strlen($description) >= 2 && strlen($brand) >= 2 &&
            strlen($model) >= 2 && strlen($color) >= 2 && is_numeric($price) && $flag == true) {

        $product = new Product($brand, $model, $price, $color, $description, $name);
        $product->setTypeProduct($typeProduct);
        $productBusiness = new ProductBusiness();
        $result = $productBusiness->insertProduct($product, $arrayImages);
        echo $result;
        if ($result == true) {
            header('location: ../Presentation/ProductCreate.php?success=success');
        } else {
            header('location: ../Presentation/ProductCreate.php?errorInsert=errorInsert');
        }
    } else {
        header('location: ../Presentation/ProductCreate.php?error=errorData');
    }
    
} else if (isset($_POST['optionUpdate'])) {
    $idProduct = $_POST['idProduct'];
    $brand = $_POST['txtBrand'];
    $name = $_POST['txtName'];
    $model = $_POST['txtModel'];
    $price = $_POST['txtPrice'];
    $color = $_POST['txtColor'];
    $description = $_POST['txtDescription'];
    $price = str_replace(",", "", $price);

    if (strlen($brand) >= 2 && strlen($model) >= 2 && strlen($color) >= 2 && is_numeric($price) && strlen($description) >= 2) {

        $product = new Product($brand, $model, $price, $color, $description, $name);
        $product->setIdProduct($idProduct);
        $productBusiness = new ProductBusiness();
        $result = $productBusiness->updateProduct($product);
        if ($result == true) {
            header('location: ../Presentation/ProductUpdate.php?success=success');
        } else {
            header('location: ../Presentation/ProductUpdate.php?errorUpdate=errorUpdate');
        }
    } else {
        header('location: ../Presentation/ProductUpdate.php?error=errorData');
    }
} else if (isset($_POST['optionDelete'])) {

    $idProduct = $_POST['idProduct'];
    $path = $_POST['path'];

    if (is_numeric($idProduct)) {

        $productBusiness = new ProductBusiness();
        $result = $productBusiness->deleteProduct($idProduct);
        $paths = split(";", $path);
        if ($result == true) {
            foreach ($paths as $currentPath) {
                unlink($currentPath);
            }
            header('location: ../Presentation/ProductDelete.php?success=success');
        } else {
            header('location: ../Presentation/ProductDelete.php?errorDelete=errorDelete');
        }
    } else {
        header('location: ../Presentation/ProductUpdate.php?error=errorData');
    }
} else if (isset($_POST['optionDeleteImg'])) {

    $idProduct = $_POST['idProduct'];
    $path = $_POST['path'];
    $productBusiness = new ProductBusiness();
    $result = $productBusiness->deleteImageProduct($idProduct, $path);
    if ($result == true) {
        unlink($path);
        header('location: ../Presentation/ProductUpdate.php?success=success');
    } else {
        header('location: ../Presentation/ProductUpdate.php?errorUpdate=error');
    }
} else if (isset($_POST['optionInsertImage'])) {

    $count = $_POST['count'];
    $idProduct = $_POST['idProduct'];
    $flag = false;
    $arrayImages = [];
    for ($i = 0; $i <= $count; $i++) {

        $fileImage = 'fileImage' . $i;
        if ($_FILES[$fileImage]["error"] > 0) {
            header('location: ../Presentation/ProductUpdate.php?error=errorData');
        } else {

            $allowed = array("image/jpg", "image/jpeg", "image/gif", "image/png");
            $limit_kb = 1000;

            if (in_array($_FILES[$fileImage]['type'], $allowed) &&
                    $_FILES[$fileImage]['size'] <= $limit_kb * 1024) {

                $path = "../images/" . $_FILES[$fileImage]['name'];

                /* verifiacion imagen a isertar no exista */
                if (!file_exists($path)) {
                    /* verificacion imagen hata movido a la ruta de destino */
                    $result = @move_uploaded_file($_FILES[$fileImage]["tmp_name"], $path);
                    if ($result) {
                        array_push($arrayImages, $path);
                        $flag = true;
                    }
                } else {
                    header('location: ../Presentation/ProductUpdate.php?errorExis=error');
                }
            } else {
                header('location: ../Presentation/ProductUpdate.php?errorSize=error');
            }
        }
    }
    if ($flag == true) {
        $product = new ProductBusiness();
        $result = $product->insertImageProduct($idProduct, $arrayImages);
        if ($result == true) {
            header('location: ../Presentation/ProductUpdate.php?success=success');
        } else {
            header('location: ../Presentation/ProductUpdate.php?errorUpdate=error');
        }
    }
}
