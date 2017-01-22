<?php
	include '../../Data/SearchData.php';
	$instSearchData = new SearchData();
	$result = $instSearchData->searchProductData($_POST['termSearch']);
	
	/*
	* Se concatena la informacion de los productos -> 
	* Los atributos se separan por "," y los productos se separan por "&"
	*/
	$response = "";
	foreach ($result as $tem) {
		if($response != ""){
			$response .= "&";
		}
		$response .= $tem->getName() . "," . $tem->getBrand() . "," . $tem->getModel() . "," .
		 $tem->getPrice() . "," .$tem->getColor() . "," . $tem->getDescription();
	}
	 echo $response;