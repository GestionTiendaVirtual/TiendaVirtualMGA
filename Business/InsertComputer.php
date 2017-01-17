<?php
include "./ComputerBusiness.php";

/* Se obtienen los datos */
$idComputer = $_POST['idComputer'];
$nameComputer = $_POST['nameComputer'];
$ramMemory = $_POST['ramMemory'];
$operativeSystem = $_POST['operativeSystem'];
$hardDisk = $_POST['hardDisk'];
$sizeDisplay = $_POST['sizeDisplay'];
$videoTarjet = $_POST['videoTarjet'];
$wifi= $_POST['wifi'];
$battery = $_POST['battery'];
$other = $_POST['other'];

/*Se hace la consulta (insercion en la BD)*/
$instComputerBusiness = new ComputerBusiness();
$result = $instComputerBusiness->insertComputerBusiness(
	$idComputer,
    $nameComputer,
    $ramMemory,
    $operativeSystem, 
    $hardDisk,
    $sizeDisplay,
    $videoTarjet,
    $wifi,
    $battery,
    $other);

/*Se retorna el resultado a la pagina de insercion*/
header("location: ../presentation/ComputerInsert.php?result=". $result);
