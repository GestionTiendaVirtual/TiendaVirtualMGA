<?php

include_once '../../Domain/CustomerShopping.php';
include_once './CustomerShoppingBusiness.php';


$idClient = $_POST['client'];
$product1 = $_POST['product1'];
$product2 = $_POST['product2'];
$product3 = $_POST['product3'];
$total = $_POST['total'];

$products = array($product1,$product2,$product3);

$customerShopping = new CustomerShopping($idClient,date('Y-m-d'),$total);

$customerBusiness = new CustomerShoppingBusiness();

$result = $customerBusiness->insertCustomerInvoice($customerShopping, $products);

if($result != false){
     header('location: ../../Presentation/Product/testCustomerShopping.php?success='.$result);
}else{
     header('location: ../../Presentation/Product/testCustomerShopping.php?error=error');
}

