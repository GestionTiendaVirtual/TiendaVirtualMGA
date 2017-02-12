<?php 
include_once "../../Data/CanceledSalesData.php";

class CanceledSales extends CanceledSalesData{

	public function getAllCanceledSalesBusiness(){
		return $this->getAllCanceledSalesData();
	}
}