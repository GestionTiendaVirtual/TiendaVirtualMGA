<?php
$insert = $_POST['btnInsert'];
//$clean = $_POST['btnCancel'];

if($insert){
$emailClient = $_POST['txtEmailClient'];
$userClient = $_POST['txtUserClient'];
$passwordClient = $_POST['txtPasswordClient'];
$nameClient = $_POST['txtNameClient'];
$lastNameFClient = $_POST['txtLastNameFClient'];
$lastNameSClient = $_POST['txtLastNameSClient'];
$bornClient = $_POST['bornClient'];
$sexClient = $_POST['cbSexClient'];
$telClient = $_POST['txtTelClient'];
$provinceClient = $_POST['cbProvinceClient'];
$cantonClient = $_POST['cantonClient'];
$districtClient = $_POST['districtClient'];
$addressClient1 = $_POST['txtAddressClient1'];
$addressClient2 = $_POST['txtAddressClient2'];



include '../../Domain/client.php';
include './clientBusiness.php';



if (strlen($nameClient) >= 2 && strlen($lastNameFClient) >= 2 && strlen($lastNameSClient) >= 2 && strlen($emailClient) >= 2 && strlen($userClient) >= 2 && strlen($passwordClient) >= 2 && strlen($addressClient1) >= 2) {
    $client = new client($nameClient, $lastNameFClient, $lastNameSClient, $emailClient, $userClient, $passwordClient, $addressClient1);
    $clientBusiness = new clientBusiness();
    
        
    
    
    
    $answer = $clientBusiness->insertClient($client);
    if ($answer == true) {
        header('location: ../../Presentation/Client/clientInterface.php?InsertClientComplete');
    } else {
        header('location: ../../Presentation/Client/clientInterface.php?error2');
    }
}else {
    header('location: ../../Presentation/Client/clientInterface.php?error1');
}
    
    
}
