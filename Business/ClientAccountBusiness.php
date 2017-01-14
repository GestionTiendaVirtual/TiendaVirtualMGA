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
	public function getIDBusiness(){
		return $this->getIdData();
	}

	public function getClientAccountByIdBusiness($idAccount) {
		return $this->getClientAccountByIdData($idAccount);
	}

	public function updateAccountBusiness($idAccount, $idClient, $bank, $typeAccount){
		return $this->updateAccountData($idAccount, $idClient, $bank, $typeAccount);
	}

	/* ================== Validaciones -> true(datos correctos) ==================*/

	/* Valida que los datos no esten vacios*/
	public function validateEmpty($arrayVar){
		foreach ($arrayVar as $tem) {
			if (trim($tem) == '') {
				return false;
			}
		}
		return true;
	}

	/*Valida que los datos ingresados sean numericos*/
	public function validateNumeric($arrayVar){
		foreach ($arrayVar as $tem) {
			if ((filter_var(trim($tem), FILTER_VALIDATE_INT)) === false) {
				return false;
			}
		}
		return true;
	}
}