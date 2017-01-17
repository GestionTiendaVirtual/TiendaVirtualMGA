<?php
include "../Data/CelphoneData.php";

class CelphoneBusiness extends CelphoneData{


	public function getAllCelphoneBusiness(){
		return $this->getAllCelphoneData();
	}

	public function insertCelphoneBusiness($idCelphone,        
        $nameCelphone,
        $net,
        $yearCreate, 
        $typeDisplay,
        $sizeDisplay,
        $sdMemory,
        $operativeSystem,
        $camera,
        $other){
		return $this->insertCelphoneData(
			$idCelphone,        
	        $nameCelphone,
	        $net,
	        $yearCreate, 
	        $typeDisplay,
	        $sizeDisplay,
	        $sdMemory,
	        $operativeSystem,
	        $camera,
	        $other);
	}

	public function deleteCelphoneBusiness($idCelphone){
		return $this->deleteCelphoneData($idCelphone);
	}
}