<?php
include '../Product/ProductBusiness.php';
$instProductBusiness = new ProductBusiness();
$listProduct = $instProductBusiness->getProducts();
$result = "";
foreach ($listProduct as $productTem) {
	$nameTem = $instProductBusiness->deleteSpecialCharacters($productTem->getName());
	$descriptionTem = $instProductBusiness->deleteSpecialCharacters($productTem->getDescription());
	$modelTem = $instProductBusiness->deleteSpecialCharacters($productTem->getModel());
	$brandTem = $instProductBusiness->deleteSpecialCharacters($productTem->getBrand());
	$result .= trim($nameTem) . " " . trim($descriptionTem) . " " . trim($modelTem) . " " . trim($brandTem) . " ";
}
echo trim($result);

