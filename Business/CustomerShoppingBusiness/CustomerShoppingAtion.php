<?php

include_once '../../Domain/CustomerShopping.php';
include_once './CustomerShoppingBusiness.php';


if (isset($_POST['create'])) {

    $idClient = $_POST['client'];
    $product1 = $_POST['product1'];
    $product2 = $_POST['product2'];
    $product3 = $_POST['product3'];
    $total = $_POST['total'];
    
    $products = array($product1, $product2, $product3);

    $customerShopping = new CustomerShopping($idClient, date('Y-m-d'), $total);

    $customerBusiness = new CustomerShoppingBusiness();

    $result = $customerBusiness->insertCustomerInvoice($customerShopping, $products);

    if ($result != false) {
        header('location: ../../Presentation/CustomerShopping/testCustomerShopping.php?success=' . $result);
    } else {
        header('location: ../../Presentation/CustomerShopping/testCustomerShopping.php?error=error');
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




