<?php
include "./ClientAccountBusiness.php";

/* Se obtienen los datos */
$idAccount = $_GET['idAccount'];

$instClientAccountBusiness = new ClientAccountBusiness();

/*Validamos*/
$resultValidation = $instClientAccountBusiness->validateEmpty(array($idAccount));
#Si existen campos vacios
if($resultValidation == false){ 
	header("location: ../presentation/ClientAccountDelete.php?error=ERROR! Debe ingresar un valor.");
} # Si es ingresado un dato no numerico en un campo de tipo numerico
elseif ($instClientAccountBusiness->validateNumeric(array($idAccount)) === false) {
	header("location: ../presentation/ClientAccountDelete.php?error=ERROR! debe ingresar un número.");
} #Si los datos son correctos se verifica si existe el id ingresado
else{
	$result = $instClientAccountBusiness->getClientAccountByIdBusiness($idAccount);
	if ((count($result)) <= 0) {
        header("location: ../presentation/ClientAccountDelete.php?error= ERROR! No se encontro la cuenta con el id: ". $idAccount);
    }
    else{
		/*Se hace la consulta (eliminacion en la BD)*/
		$result = $instClientAccountBusiness->deleteAccountBusiness($idAccount);
		header("location: ../presentation/ClientAccountDelete.php?idAccount=". $idAccount);
	}
}


