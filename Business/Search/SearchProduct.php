<?php
	include '../../Data/SearchData.php';
	$instSearchData = new SearchData();
	$result = $instSearchData->searchProductData($_POST['termSearch']);
	$response = "";
	$cont = 0;
	foreach ($result as $tem) {
		if($response != ""){
			$response .= "&";
		}
		$response .= "idProduct" . $cont . "=" . $tem->getidProduct();
		$cont++;
	}
	 echo $response;