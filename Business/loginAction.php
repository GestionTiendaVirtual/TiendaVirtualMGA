<?php

include '../Business/ClientLoginBusiness.php';

//include '../Data/Frecuency.php';
//$frecuency = new Frecuency();
//$result = $frecuency->createFrecuency();

//include './FrecuencyBusiness/FrecuencyBusiness.php';
//$frecuency = new FrecuencyBusiness();


if (isset($_POST['option']) == 'login') {
    $user = $_POST['txtUser'];
    $password = $_POST['txtPassword'];
    if (strlen($user) > 2 && strlen($password) > 2) {

        $client = array($user, $password);
        $clientBusiness = new ClientLoginBusiness();
        $result = $clientBusiness->isClient($client);

        if ($result != -1) {
            session_start();
            $_SESSION['idUser'] = $result;
            header('location: ../Presentation/Modules/ClientView.php');
        } else {
            header('location: ../index.php?errorUser=error');
        }
    } else {
        header('location: ../index.php?errorData=error');
    }
    header('location: ../Presentation/Modules/ClientView.php');
} else if (isset($_GET['logout'])) {
    $_SESSION['idUser'] = 0;
    session_start();
    session_destroy();
    header('location: ../index.php');
}



