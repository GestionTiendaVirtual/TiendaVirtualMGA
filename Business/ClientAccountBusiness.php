<?php 
include "../Data/ClientAccountData.php";

class ClientAccountBusiness extends ClientAccountData{


	public function getAllClientAccountBusiness(){
		return $this->getAllClientAccountData();
	}

	public function insertAccountBusiness($idAccount, $idClient, $bank, $typeAccount){
		return $this->insertAccountData($idAccount, $idClient, $bank, $typeAccount);
	}

	public function deleteAccountBusiness($idAccount){
		return $this->deleteAccountData($idAccount);
	}
}