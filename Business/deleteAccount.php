<?php
include "./AccountBusiness.php";

/* Se obtienen los datos */
$idAccount = $_GET['idAccount'];

$instAccountBusiness = new AccountBusiness();

/*Validamos*/
$resultValidation = $instAccountBusiness->validateEmpty(array($idAccount));
#Si existen campos vacios
if($resultValidation == false){ 
	header("location: ../presentation/ClientAccountRetrieve.php?error=ERROR! Debe ingresar un valor.");
} # Si es ingresado un dato no numerico en un campo de tipo numerico
elseif ($instAccountBusiness->validateNumeric(array($idAccount)) === false) {
	header("location: ../presentation/ClientAccountRetrieve.php?error=ERROR! debe ingresar un número.");
} #Si los datos son correctos se verifica si existe el id ingresado
else{
	$result = $instAccountBusiness->getAccountByIdBusiness($idAccount);
	if ((count($result)) <= 0) {
        header("location: ../presentation/ClientAccountRetrieve.php?error= ERROR! No se encontro la cuenta con el id: ". $idAccount);
    }
    else{
		/*Se hace la consulta (eliminacion en la BD)*/
		$result = $instAccountBusiness->deleteAccountBusiness($idAccount);
		header("location: ../presentation/ClientAccountRetrieve.php?msg=Se realizo la eliminación de la cuenta con el ID: ". $idAccount);
	}
}


