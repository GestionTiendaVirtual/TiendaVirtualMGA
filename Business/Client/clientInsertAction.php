<?php
$insert = $_POST['btnInsert'];
//$clean = $_POST['btnCancel'];

if($insert){

$nameClient = $_POST['txtNameClient'];
$lastNameFClient = $_POST['txtLastNameFClient'];
$lastNameSClient = $_POST['txtLastNameSClient'];
$emailClient = $_POST['txtEmailClient'];
$userClient = $_POST['txtUserClient'];
$passwordClient = $_POST['txtPasswordClient'];
$addressClient = $_POST['txtAddressClient'];

include '../../Domain/client.php';
include './clientBusiness.php';



if (strlen($nameClient) >= 2 && strlen($lastNameFClient) >= 2 && strlen($lastNameSClient) >= 2 && strlen($emailClient) >= 2 && strlen($userClient) >= 2 && strlen($passwordClient) >= 2 && strlen($addressClient) >= 2) {
    $client = new client($nameClient, $lastNameFClient, $lastNameSClient, $emailClient, $userClient, $passwordClient, $addressClient);
    $clientBusiness = new clientBusiness();
    $answer = $clientBusiness->insertClient($client);
    if ($answer == true) {
        header('location: ../../Presentation/Client/clientInterface.php?InsertClientComplete');
    } else {
        header('location: ../../Presentation/Client/clientInterface.php?error=errorData'.$answer . "n");
    }
}else {
    header('location: ../../Presentation/Client/clientInterface.php?ErrorInformatic');
}
    
    
}
