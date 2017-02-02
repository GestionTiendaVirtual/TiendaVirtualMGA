<?php
/*include '../Product/ProductBusiness.php';
$instProductBusiness = new ProductBusiness();
$listProduct = $instProductBusiness->getProducts();
*/

include 'SearchProductBusiness.php';
$inst = new SearchProductBusiness();
$term = $_GET['term'];

$listProduct = $inst->searchProducAutocomplete($term);


foreach ($listProduct as $productTem) {
	$name=$productTem->getName();
	$brand = $productTem->getBrand();
	$typeProduct = $productTem->getTypeProduct();
	$model = $productTem->getModel();

	$concatena[] = $typeProduct. " " .$brand . " " . $model . " " . $name;
}
echo json_encode($concatena);

/*
$result = "";
foreach ($listProduct as $productTem) {
	$nameTem = $instProductBusiness->deleteSpecialCharacters($productTem->getName());
	$descriptionTem = $instProductBusiness->deleteSpecialCharacters($productTem->getDescription());
	$modelTem = $instProductBusiness->deleteSpecialCharacters($productTem->getModel());
	$brandTem = $instProductBusiness->deleteSpecialCharacters($productTem->getBrand());
	$result .= trim($nameTem) . " " . trim($descriptionTem) . " " . trim($modelTem) . " " . trim($brandTem) . " ";
}
echo trim($result);

*/


