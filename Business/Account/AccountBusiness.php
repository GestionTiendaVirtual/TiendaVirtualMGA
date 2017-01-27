<?php 
include "../../Data/AccountData.php";

class AccountBusiness extends AccountData{


	public function getAllAccountAssetsBusiness(){
		return $this->getAllAccountAssetsData();
	}

	public function insertAccountBusiness($account){
		return $this->insertAccountData($account);
	}

	public function deactivateAccountBusiness($idAccount){
		return $this->deactivateAccountData($idAccount);
	}
	
	public function getIDBusiness(){
		return $this->getIdData();
	}

	public function getAccountByIdBusiness($idAccount) {
		return $this->getAccountByIdData($idAccount);
	}

	public function updateAccountBusiness($account){
		return $this->updateAccountData($account);
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