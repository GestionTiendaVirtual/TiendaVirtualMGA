<?php
include "./AccountBusiness.php";

/* Se obtienen los datos */
$idAccount = $_POST['idAccount'];
$idClient = $_POST['idClient'];
$CSC = $_POST['CSC'];
$typeAccount = $_POST['typeAccount'];
$expirationDate = $_POST['expirationDate'];
$cardNumber = $_POST['cardNumber'];

$instAccountBusiness = new AccountBusiness();

/*Validamos*/
$resultValidation = $instAccountBusiness->validateEmpty(array($idAccount,$idClient,$typeAccount,$expirationDate,$cardNumber,$CSC));
#Si existen campos vacios
if($resultValidation == false){ 
	header("location: ../presentation/ClientAccountRetrieve.php?msg=Ningun campo debe quedar vacío.");
} # Si es ingresado un dato no numerico en un campo de tipo numerico
elseif ($instAccountBusiness->validateNumeric(array($idAccount,$idClient)) === false) {
	header("location: ../presentation/ClientAccountRetrieve.php?msg=Error de tipo numérico.");
} #Si los datos son correctos entonces se hace la consulta en la BD
else{
	$account = new Account($CSC, $expirationDate, $idClient, $idAccount, $cardNumber, $typeAccount);
	$result = $instAccountBusiness->insertAccountBusiness($account);
	header("location: ../presentation/ClientAccountRetrieve.php?msg=La insercion se realizo con exito.");
}

