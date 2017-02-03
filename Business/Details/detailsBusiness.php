<?php

include '../../Data/detailsData.php';
/**
 * Descripcion de clientBusiness
 * Clase donde se realizan las conexiones entre la interface y la clase data , 
 * para llevar a cabo el CRUD que corresponde a client
 * @author Alberth Calderon Alvarado
 */
class detailsBusiness 
{
    public $detailsData;
    
    function detailsBusiness() {
        $this->detailsData = new detailsData();
    }
    public function deleteDesire($idProductWish, $idclientWish) {
        return $this->detailsData->deleteDesire($idProductWish, $idclientWish);
    }

    public function insertDesire($idProductWish, $idclientWish) {
        return $this->detailsData->insertDesire($idProductWish, $idclientWish);
    }

    public function isDesired($idProductWish, $idclientWish) {
        return $this->detailsData->isDesired($idProductWish, $idclientWish);
    }

}
