<?php
$idClient = $_POST['idClient'];
$nameClient = $_POST['nameClient'];
$lastNameFClient = $_POST['lastNameFClient'];
$lastNameSClient = $_POST['lastNameSClient'];
$emailClient = $_POST['emailClient'];
$userClient = $_POST['userClient'];
$passwordClient = $_POST['passwordClient'];
$addressClient = $_POST['addressClient'];
$delete = $_POST['delete'];
$update = $_POST['update'];




if ($delete) {
    include './clientBusiness.php';
    
    if (is_numeric($idClient)) {
        $clientBusiness = new clientBusiness();
        $result = $clientBusiness->deleteClient($idClient);
        if ($result == true) {
            header('location: ../../Presentation/Client/clientInterface.php?success=success');
        } else {
            header('location: ../../Presentation/Client/clientInterface.php?errorDelete=errorDelete');
        }
    } else {
        header('location: ../../Presentation/Client/clientInterface.php?error=Valor no numerico');
    }
}
elseif ($update) {
    include './clientBusiness.php';
    include_once  '../../Domain/client.php';
    if (is_numeric($idClient) && strlen($nameClient) >= 2 
            && strlen($lastNameFClient) >= 2
            && strlen($lastNameSClient) >= 2
            && strlen($emailClient) >= 2
            && strlen($userClient) >= 2
            && strlen($passwordClient) >= 2
            && strlen($addressClient) >= 2) {
        $client = new client($nameClient,
                $lastNameFClient,
                $lastNameSClient,
                $emailClient,
                $userClient,
                $passwordClient,
                $addressClient);
        $client->setIdClient($idClient);
        $clientBusiness = new clientBusiness();
        $result = $clientBusiness->updateClient($client);
        if ($result == true) {
            header('location: ../../Presentation/Client/clientInterface.php?success=success');
        } else {
            header('location: ../../Presentation/Client/clientInterface.php?errorUpdate=errorUpdate');
        }
    } else {
        header('location: ../../Presentation/Client/clientInterface.php?error=errorData');
    }
} else {
        header('location: ../../Presentation/Client/clientInterface.php?error=errorChange');
    }




