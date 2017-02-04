<?php
include "./AccountBusiness.php";

/*$CSC, $expirationDate, $idClient, $idAccount, $cardNumber, $typeAccount*/

/* Se obtienen los datos */
session_start();
$idAccount = $_POST['idAccount'];
$idClient = $_SESSION["idUser"];
$CSC = $_POST['CSC'];
$typeAccount = $_POST['typeAccount'];
$expirationDate = $_POST['expirationDate'];
$cardNumber = $_POST['cardNumber'];

/*Se hace la consulta (actualizacion en la BD)*/
$accountBusiness = new AccountBusiness();

/*Validamos*/
$resultValidation = $accountBusiness->validateEmpty(array($idAccount,     $idClient,$CSC,$typeAccount,$expirationDate,$cardNumber));
#Si existen campos vacios
if($resultValidation == false){ 
	header("location: ../../Presentation/Account/AccountInterface.php?msg=Ningun campo debe quedar vacío.");
} # Si es ingresado un dato no numerico en un campo de tipo numerico
elseif ($accountBusiness->validateNumeric(array($idAccount,$idClient)) == false) {
	header("location: ../../Presentation/Account/AccountInterface.php?msg=error de tipo numérico.");
} #Si los datos son correctos entonces se hace la consulta en la BD
else{
	//Ordenamos la fecha;
	$tem = split("/",$expirationDate);
	$expirationDate = $tem[2]."-".$tem[0]."-".$tem[1];
	$account = new Account($CSC, $expirationDate, $idClient, $idAccount, $cardNumber, $typeAccount, "");
	$result = $accountBusiness->updateAccountBusiness($account);

	/*Se retorna el resultado a la pagina de actualizacion*/
	header("location: ../../Presentation/Account/AccountInterface.php?msg=success");
}