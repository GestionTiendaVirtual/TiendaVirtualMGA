<?php
include "./ClientAccountBusiness.php";

/* Se obtienen los datos */
$idAccount = $_POST['idAccount'];
$idClient = $_POST['idClient'];
$bank = $_POST['bank'];
$typeAccount = $_POST['typeAccount'];

/*Se hace la consulta (actualizacion en la BD)*/
$instClientAccountBusiness = new ClientAccountBusiness();

/*Validamos*/
$resultValidation = $instClientAccountBusiness->validateEmpty(array($idAccount,$idClient,$bank,$typeAccount));
#Si existen campos vacios
if($resultValidation == false){ 
	header("location: ../presentation/ClientAccountUpdate.php?error=Ningun campo debe quedar vacío.");
} # Si es ingresado un dato no numerico en un campo de tipo numerico
elseif ($instClientAccountBusiness->validateNumeric(array($idAccount,$idClient)) == false) {
	header("location: ../presentation/ClientAccountUpdate.php?error=Error de tipo numérico.");
} #Si los datos son correctos entonces se hace la consulta en la BD
else{
	$result = $instClientAccountBusiness->updateAccountBusiness($idAccount, $idClient, $bank, $typeAccount);

	/*Se retorna el resultado a la pagina de actualizacion*/
	header("location: ../presentation/ClientAccountUpdate.php?idAccount=".$idAccount."&idClient=".$idClient.
		"&bank=".$bank."&typeAccount=".$typeAccount);
}