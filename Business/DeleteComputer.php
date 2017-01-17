<?php
include "./ComputerBusiness.php";

/* Se obtienen los datos */
$idComputer = $_GET['idComputer'];

/*Se hace la consulta (insercion en la BD)*/
$instComputerBusiness = new ComputerBusiness();
$result = $instComputerBusiness->deleteComputerBusiness($idComputer);

/*Se retorna el resultado a la pagina de insercion*/
header("location: ../presentation/ComputerDelete.php?result=". $result);