<?php
include "../Data/ComputerData.php";

class ComputerBusiness extends ComputerData{


	public function getAllComputerBusiness(){
		return $this->getAllComputerData();
	}

	public function insertComputerBusiness($idComputer,        
        $nameComputer,
        $ramMemory,
        $operativeSystem, 
        $hardDisk,
        $sizeDisplay,
        $videoTarjet,
        $wifi,
        $battery,
        $other){
		return $this->insertComputerData(
			$idComputer,        
	        $nameComputer,
	        $ramMemory,
	        $operativeSystem, 
	        $hardDisk,
	        $sizeDisplay,
	        $videoTarjet,
	        $wifi,
	        $battery,
	        $other);
	}

	public function deleteComputerBusiness($idComputer){
		return $this->deleteComputerData($idComputer);
	}
}