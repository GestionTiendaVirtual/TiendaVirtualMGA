<?php

include_once '../../Domain/CustomerShopping.php';
include_once './CustomerShoppingBusiness.php';
session_start();

if (isset($_POST['create'])) {
    
    $total = $_POST['total'];
    $idClient = $_SESSION['idUser'];
    
    $products = [];
    
     for ($i = 0; $i < sizeof($_SESSION['carrito']); $i++){
        
        $product = $_SESSION['carrito'][$i];
        $infoProduct = split(";",$product);
        
        array_push($products, $infoProduct[0]);        
    }  
    $customerShopping = new CustomerShopping($idClient, date('Y-m-d'), $total);

    $customerBusiness = new CustomerShoppingBusiness();

    $result = $customerBusiness->insertCustomerInvoice($customerShopping, $products);

    if ($result != false) {
        $_SESSION['carrito'] = [];
        header('location: ../../Presentation/ShoppingCar/ShoppingCar.php?success=success');
    } else {
        header('location: ../../Presentation/ShoppingCar/ShoppingCar.php?error=error');
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




