<?php
include "./AccountBusiness.php";

/*$CSC, $expirationDate, $idClient, $idAccount, $cardNumber, $typeAccount*/

/* Se obtienen los datos */
$idAccount = $_POST['idAccount'];
$idClient = $_POST['idClient'];
$CSC = $_POST['CSC'];
$typeAccount = $_POST['typeAccount'];
$expirationDate = $_POST['expirationDate'];
$cardNumber = $_POST['cardNumber'];

/*Se hace la consulta (actualizacion en la BD)*/
$accountBusiness = new AccountBusiness();

/*Validamos*/
$resultValidation = $accountBusiness->validateEmpty(array($idAccount,$idClient,$CSC,$typeAccount,$expirationDate,$cardNumber));
#Si existen campos vacios
if($resultValidation == false){ 
	header("location: ../presentation/ClientAccountUpdate.php?error=Ningun campo debe quedar vacío.");
} # Si es ingresado un dato no numerico en un campo de tipo numerico
elseif ($accountBusiness->validateNumeric(array($idAccount,$idClient)) == false) {
	header("location: ../presentation/ClientAccountUpdate.php?error=Error de tipo numérico.");
} #Si los datos son correctos entonces se hace la consulta en la BD
else{
	$account = new Account($CSC, $expirationDate, $idClient, $idAccount, $cardNumber, $typeAccount);
	$result = $accountBusiness->updateAccountBusiness($account);

	/*Se retorna el resultado a la pagina de actualizacion*/
	header("location: ../presentation/ClientAccountUpdate.php?result=success");
}