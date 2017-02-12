<?php

include_once '../../Domain/CustomerShopping.php';
include_once './CustomerShoppingBusiness.php';

/*Web service*/
include_once '../../lib/libNusoap/nusoap.php';

session_start();

if (isset($_POST['create'])) {

    if (sizeof($_SESSION['carrito']) > 0) {

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





        /*==================  Web Service ================*/
            /*Objeto cliente*/
        $cliente = new nusoap_client('http://localhost/WebService/Servicio.php',false);

        /*Datos a pasar*/
        /*X*/ $nameClient = "Gustavo Najera";
        /*X*/ $numAccount = 123456789;
        /*X*/ $csc = 123;
              $monto = $total;
              $nameBusiness = "MGASoluciones";
        /*X*/ $numSale = 45;
              $date = date('Y-m-d');


        $parametros = array('nameClient' => $nameClient, 'numAccount' => $numAccount,
                            'csc' => $csc, 'monto' => $monto, 'nameBusiness' => $nameBusiness,
                            'numSale' => $numSale, 'date' => $date);

        /*
        * Pide ->
        * 1) Nombre de la funcion
        * 2) Parametros
        */
        $resultBank = $cliente->call("CompraEnLinea", $parametros);
        print_r($resultBank);

        /*================  End Web Service ==============*/



        /*Se agrega la validacion del web service*/
        /*if ($result != false && $resultBank != false) {
            $_SESSION['carrito'] = [];
            header('location: ../../Presentation/ShoppingCar/ShoppingCar.php?success=success');
        } else {
            header('location: ../../Presentation/ShoppingCar/ShoppingCar.php?error=error');
        }*/
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




