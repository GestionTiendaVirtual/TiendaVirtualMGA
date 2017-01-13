<?php
include "./ClientAccountBusiness.php";

/* Se obtienen los datos */
$idAccount = $_GET['idAccount'];

/*Se hace la consulta (insercion en la BD)*/
$instClientAccountBusiness = new ClientAccountBusiness();
$result = $instClientAccountBusiness->deleteAccountBusiness($idAccount);

/*Se retorna el resultado a la pagina de insercion*/
header("location: ../presentation/ClientAccountDelete.php?result=". $result);