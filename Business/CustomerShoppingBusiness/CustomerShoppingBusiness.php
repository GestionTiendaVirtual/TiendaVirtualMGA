<?php

include_once '../../Data/CustomerShoppingData.php';

/**
 * Description of CustomerShoppingBusiness
 *
 * @author Michael Meléndez Mesén
 */
class CustomerShoppingBusiness {
    
    public $customerShoppingDate;
    
    public function CustomerShoppingBusiness(){
        $this->customerShoppingDate = new CustomerShoppingData();        
    }
    
    public function getCustomerInvoice($idSale){
        return $this->customerShoppingDate->getCustomerInvoice($idSale);
    }
    
    public function insertCustomerInvoice($customerShopping,$products){
        return $this->customerShoppingDate->insertCustomerInvoice($customerShopping,$products);
    }
    public function cancelInvoice($id){
        return $this->customerShoppingDate->cancelInvoice($id);
    }
    
    
}
