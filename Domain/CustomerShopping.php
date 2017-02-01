<?php


/**
 * Description of CustomerShopping
 *
 * @author mm
 */
class CustomerShopping {
    
    private $idClient;
    private $datePurchase;
    private $totalPurchase;
    private $idSale;
    
    public function CustomerShopping($idClient,
            $datePurchase,$totalPurchase){
        $this->idClient = $idClient;
        $this->datePurchase = $datePurchase;
        $this->totalPurchase = $totalPurchase;                
    }
    
    public function getIdClient(){
        return $this->idClient;
    }
    public function setIdClient($id){
        $this->idClient = $id;
    }
    
    public function getIdSale(){
        return $this->idSale;
    }
    public function setIdSale($id){
        $this->idSale = $id;
    }
    public function getDatePurchase(){
        return $this->datePurchase;
    }
    public function setDatePurchase($date){
        $this->datePurchase = $date;
    }
    
    public function getTotalPurchase(){
        return $this->totalPurchase;
    }
    public function setTotalPurchase($total){
        $this->totalPurchase = $total;
    }
    
}
