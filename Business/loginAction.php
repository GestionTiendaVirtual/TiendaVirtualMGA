<?php

include '../Business/ClientLoginBusiness.php';


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
            header('location: ../index.php');
        } else {
            header('location: ../index.php?errorUser=error');
        }
    } else {
        header('location: ../index.php?errorData=error');
    }
    header('location: ../index.php');
} else if (isset($_GET['logout'])) {
    session_start();
    session_destroy();
    header('location: ../index.php');
}



