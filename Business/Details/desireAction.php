<?php

$idProductDesire = $_POST['idProductWish'];
$idClientDesire = $_POST['idClientWish'];
include '../../Business/Details/detailsBusiness.php';
$detailsBusiness = new detailsBusiness();

if (isset($_REQUEST['checkWish'])) {
    $result = $detailsBusiness->deleteDesire($idProductDesire, $idClientDesire);
    if ($result) {
        header('location: ../../Presentation/Product/ProductDetails.php?idProduct=' . $idProductDesire . "####");
    } else {
        header('location: ../../Presentation/Product/ProductDetails.php?idProduct=' . $idProductDesire . "###");
    }
} else {
    $result = $detailsBusiness->insertDesire($idProductDesire, $idClientDesire);
    if ($result) {
        header('location: ../../Presentation/Product/ProductDetails.php?idProduct=' . $idProductDesire . "##");
    } else {
        header('location: ../../Presentation/Product/ProductDetails.php?idProduct=' . $idProductDesire . "#");
    }
}
?>
    