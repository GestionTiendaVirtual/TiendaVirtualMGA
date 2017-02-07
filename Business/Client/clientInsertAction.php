<?php

$insert = $_POST['btnInsert'];
//$clean = $_POST['btnCancel'];

if ($insert) {
    $emailClient = $_POST['txtEmailClient'];
    $userClient = $_POST['txtUserClient'];
    $passwordClient = $_POST['txtPasswordClient'];
    $nameClient = $_POST['txtNameClient'];
    $lastNameFClient = $_POST['txtLastNameFClient'];
    $lastNameSClient = $_POST['txtLastNameSClient'];
    $bornClient = $_POST['bornClient'];
    $sexClient = $_POST['cbSexClient'];
    $telClient = $_POST['txtTelClient'];
    $provinceClient = $_POST['cmbProvince'];
    $cantonClient = $_POST['cmbCanton'];
    $districtClient = $_POST['cmbDistrict'];
    $addressClient1 = $_POST['txtAddressClient1'];
    $addressClient2 = $_POST['txtAddressClient2'];



    include '../../Domain/client.php';
    include './clientBusiness.php';


    if (strlen($emailClient) >= 2) {
        if (strlen($userClient) >= 2) {
            if (strlen($passwordClient) >= 2) {
                if (strlen($nameClient) >= 2) {
                    if (strlen($lastNameFClient) >= 2) {
                        if (strlen($lastNameSClient) >= 2) {
                            if (strlen($bornClient) >= 2) {
                                if (strlen($sexClient) >= 2) {
                                    if (strlen($telClient) >= 2 && is_numeric($telClient)) {
                                        if (strlen($addressClient1) >= 2) {
                                            if (strlen($addressClient2) >= 2) {

                                                if (is_numeric($provinceClient)) {
                                                    if (is_numeric($cantonClient)) {
                                                        if (is_numeric($districtClient)) {

                                                            $client = new client($emailClient, $userClient, $passwordClient,
                                                                    $nameClient, $lastNameFClient, $lastNameSClient,$bornClient,
                                                                    $sexClient,$telClient,$provinceClient,$cantonClient,
                                                                    $districtClient, $addressClient1,
                                                                    $addressClient2);
                                                            $clientBusiness = new clientBusiness();
                                                            $answer = $clientBusiness->insertClient($client);
                                                            if ($answer == true) {
                                                                header('location: ../../Presentation/Client/clientInterface.php?InsertClientComplete');
                                                            } else {
                                                                header('location: ../../Presentation/Client/clientInterface.php?errorSQL');
                                                            }
                                                        } else {
                                                            header('location: ../../Presentation/Client/clientInterface.php?dis');
                                                        }
                                                    } else {
                                                        header('location: ../../Presentation/Client/clientInterface.php?can');
                                                    }
                                                } else {
                                                    header('location: ../../Presentation/Client/clientInterface.php?pro='.$provinceClient.'.');
                                                }
                                            } else {
                                                header('location: ../../Presentation/Client/clientInterface.php?ad2');
                                            }
                                        } else {
                                            header('location: ../../Presentation/Client/clientInterface.php?ad1');
                                        }
                                    } else {
                                        header('location: ../../Presentation/Client/clientInterface.php?tel');
                                    }
                                } else {
                                    header('location: ../../Presentation/Client/clientInterface.php?sex');
                                }
                            } else {
                                header('location: ../../Presentation/Client/clientInterface.php?born');
                            }
                        } else {
                            header('location: ../../Presentation/Client/clientInterface.php?ln2');
                        }
                    } else {
                        header('location: ../../Presentation/Client/clientInterface.php?ln1');
                    }
                } else {
                    header('location: ../../Presentation/Client/clientInterface.php?name');
                }
            } else {
                header('location: ../../Presentation/Client/clientInterface.php?pass');
            }
        } else {
            header('location: ../../Presentation/Client/clientInterface.php?user');
        }
    } else {
        header('location: ../../Presentation/Client/clientInterface.php?email');
    }
}



    