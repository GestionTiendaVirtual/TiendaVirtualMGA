<?php
include "./ClientAccountBusiness.php";

/* Se obtienen los datos */
$idAccount = $_POST['idAccount'];
$idClient = $_POST['idClient'];
$bank = $_POST['bank'];
$typeAccount = $_POST['typeAccount'];

/*Se hace la consulta (insercion en la BD)*/
$instClientAccountBusiness = new ClientAccountBusiness();
$result = $instClientAccountBusiness->insertAccountBusiness($idAccount, $idClient, $bank, $typeAccount);

/*Se retorna el resultado a la pagina de insercion*/
header("location: ../presentation/ClientAccountInsert.php?result=". $result);