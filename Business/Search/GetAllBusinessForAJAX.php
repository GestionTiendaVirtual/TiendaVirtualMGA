<?php
/*include '../Product/ProductBusiness.php';
$instProductBusiness = new ProductBusiness();
$listProduct = $instProductBusiness->getProducts();
*/
include '../../Domain/Product.php';
include 'SearchProductBusiness.php';
$inst = new SearchProductBusiness();
$term = $_GET['term'];
$typeTerm = $_GET['typeTerm'];

$listProduct = $inst->searchProducAutocomplete($term);

foreach ($listProduct as $productTem) {
	$name=$productTem->getName();
	$brand = $productTem->getBrand();
	$typeProduct = $productTem->getTypeProduct();
	$model = $productTem->getModel();

	$result = array($typeProduct, $brand, $model, $name);
	$concatena[] = $result[$typeTerm];
}
echo json_encode($concatena);


