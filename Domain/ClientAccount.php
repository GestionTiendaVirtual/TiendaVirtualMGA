<?php

/**
 * Description of ClientAccount
 *
 * @author Gustavo
 */
class ClientAccount {
    public $idClient;
    public $idAccount;
    public $bank;
    public $typeAccount;
    
    public function ClientAccount($idClient, $idAccount, $bank, $typeAccount){
        $this->idClient = $idClient;
        $this->idAccount = $idAccount;
        $this->bank = $bank;
        $this->typeAccount = $typeAccount;
    }
}