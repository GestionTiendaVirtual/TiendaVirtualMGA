<?php
	include '../../Data/SearchData.php';
	
	/*La presente clase contiene los metodos referentes a busquedas de productos*/

	class SearchProductBusiness extends SearchData{

		public function searchProduc($termSearch){
			return $this->searchProductData($termSearch);
		}

	}