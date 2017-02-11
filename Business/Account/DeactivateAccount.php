<?php
include "./AccountBusiness.php";

/* Se obtienen los datos */
$idAccount = $_GET['idAccount'];

$instAccountBusiness = new AccountBusiness();

/*Validamos*/
$resultValidation = $instAccountBusiness->validateEmpty(array($idAccount));
#Si existen campos vacios
if($resultValidation == false){ 
	header("location: ../../presentation/Account/AccountInterface.php?msg=ERROR! Debe ingresar todos los datos solicitados.");
} # Si es ingresado un dato no numerico en un campo de tipo numerico
elseif ($instAccountBusiness->validateNumeric(array($idAccount)) === false) {
	header("location: ../../Presentation/Account/AccountInterface.php?msg=Error de tipo numérico.");
} #Si los datos son correctos se verifica si existe el id ingresado
else{
	$result = $instAccountBusiness->getAccountByIdBusiness($idAccount);
	if ((count($result)) <= 0) {
        header("location: ../../Presentation/Account/AccountInterface.php?msg= ERROR! No se encontraron coincidencias.");
    }
    else{
		/*Se hace la consulta (desactivacion en la BD)*/
		$result = $instAccountBusiness->deactivateAccountBusiness($idAccount);
		header("location: ../../Presentation/Account/AccountInterface.php?msg=Se realizó con éxito.");
	}
}
