<?php
include "./CelphoneBusiness.php";

/* Se obtienen los datos */
$idCelphone = $_GET['idCelphone'];

/*Se hace la consulta (insercion en la BD)*/
$instCelphoneBusiness = new CelphoneBusiness();
$result = $instCelphoneBusiness->deleteCelphoneBusiness($idCelphone);

/*Se retorna el resultado a la pagina de insercion*/
header("location: ../presentation/CelphoneDelete.php?result=". $result);