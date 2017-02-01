<?php

include '../Data/ClientLoginData.php';
/**
 * Description of ClinetLoginBusiness
 *
 * @author mm
 */
class ClientLoginBusiness{ 

    public $clientData;

    public function ClientLoginBusiness(){
        $this->clientData = new ClientLoginData();
    }
    
    public function isClient($client){
        return $this->clientData->isClient($client);
    }
}
