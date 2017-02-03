<?php
	include '../../Data/SearchData.php';
	
	/*La presente clase contiene los metodos referentes a busquedas de productos*/

	class SearchProductBusiness{
		public $inst;
		function SearchProductBusiness(){
			$this->inst = new SearchData();
		}

		public function searchProduc($termSearch){
			return $this->inst->searchProductData($termSearch);
		}
		
		public function searchProducAutocomplete($termSearch){
			return $this->inst->searchProductAutompleteData($termSearch);
		}

	}
