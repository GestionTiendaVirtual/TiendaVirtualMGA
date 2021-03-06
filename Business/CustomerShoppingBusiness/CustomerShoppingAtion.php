<?php

include_once './CustomerShoppingBusiness.php';
include_once '../../Domain/CustomerShopping.php';

/* Web service */
include '../../lib/libNusoap/nusoap.php';
include '../Account/AccountBusiness.php';
include_once '../Client/clientBusiness.php';

session_start();

if (isset($_POST['create'])) {

    if (sizeof($_SESSION['carrito']) > 0 && $_POST['account'] != "" ) {

        $total = $_POST['total'];
        $idClient = $_SESSION['idUser'];

        $products = [];

        for ($i = 0; $i < sizeof($_SESSION['carrito']); $i++) {
            $product = $_SESSION['carrito'][$i];
            $infoProduct = split(";", $product);
            array_push($products, $infoProduct[0]);
        }
        $customerShopping = new CustomerShopping($idClient, date('Y-m-d'), $total);
        $customerBusiness = new CustomerShoppingBusiness();
        $result = $customerBusiness->insertCustomerInvoice($customerShopping, $products);

        /* Se agrega la validacion del web service */
        if ($result != false) {

            $_SESSION['carrito'] = [];

            /* ==================  Web Service ================ */
            /* Se obtiene la cuenta */
            $accountBusiness = new AccountBusiness();
            $myAccount = $accountBusiness->getAccountByIdBusiness($_POST['account'])[0];

            /* Se obtiene el cliente */
            $instClient = new clientBusiness();
            $client = $instClient->getClientById($idClient);

            /* Datos a pasar */
            $nameClient = $client->nameClient;
            $numAccount = $myAccount->cardNumber;
            $csc = $myAccount->CSC;
            $monto = $total;
            $nameBusiness = "MGASoluciones";
            $numSale = $result;
            $date = date('Y-m-d');
            $parametros = array('nameClient' => $nameClient, 'numAccount' => $numAccount,
                'csc' => $csc, 'monto' => $monto, 'nameBusiness' => $nameBusiness,
                'numSale' => $numSale, 'date' => $date);
            /*
             * $cliente->call   Solicita->
             * 1) Nombre de la funcion
             * 2) Parametros
             */
            /* Objeto cliente que hace referencia al webservice */
            $cliente = new nusoap_client('http://localhost/WebService/Servicio.php', false);
            $resultBank = $cliente->call("CompraEnLinea", $parametros);
            /* print_r($resultBank); */

            /* ================  End Web Service ============== */
            if ($resultBank != false) {
                header('location: ../../Presentation/ShoppingCar/ShoppingCar.php?success=success');
            }
        } else {
            header('location: ../../Presentation/ShoppingCar/ShoppingCar.php?error=error');
        }
    } else {
        header('location: ../../Presentation/ShoppingCar/ShoppingCar.php?errorData=error');
    }
} else if (isset($_POST['optionState'])) {

    $idSale = $_POST['idSale'];

    $customerShopping = new CustomerShoppingBusiness();
    $result = $customerShopping->cancelInvoice($idSale);
    if ($result) {
        header('location: ../../Presentation/CustomerShopping/CustomerShoppingState.php?success=success');
    } else {
        header('location: ../../Presentation/CustomerShopping/CustomerShoppingState.php?error=error');
    }
}




