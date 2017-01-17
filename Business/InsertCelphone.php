<?php
include "./CelphoneBusiness.php";

/* Se obtienen los datos */
$idCelphone = $_POST['idCelphone'];
$nameCelphone = $_POST['nameCelphone'];
$net = $_POST['net'];
$yearCreate = $_POST['yearCreate'];
$typeDisplay = $_POST['typeDisplay'];
$sizeDisplay = $_POST['sizeDisplay'];
$sdMemory = $_POST['sdMemory'];
$operativeSystem = $_POST['operativeSystem'];
$camera = $_POST['camera'];
$other = $_POST['other'];

/*Se hace la consulta (insercion en la BD)*/
$instCelphoneBusiness = new CelphoneBusiness();
$result = $instCelphoneBusiness->insertCelphoneBusiness($idCelphone,        
	        $nameCelphone,
	        $net,
	        $yearCreate, 
	        $typeDisplay,
	        $sizeDisplay,
	        $sdMemory,
	        $operativeSystem,
	        $camera,
	        $other);

/*Se retorna el resultado a la pagina de insercion*/
header("location: ../presentation/CelphoneInsert.php?result=". $result);
