<?php

/**
 * Description of Account
 *
 * @author Gustavo
 */
class Account {
    public $CSC;
    public $expirationDate;
    public $idClient;
    public $idAccount;
    public $cardNumber;
    public $typeAccount;
    public $direction;
    
    public function Account($CSC, $expirationDate, $idClient, $idAccount, $cardNumber, $typeAccount, $direction){
        $this->CSC = $CSC;
        $this->expirationDate = $expirationDate;
        $this->idClient = $idClient;
        $this->idAccount = $idAccount;
        $this->cardNumber = $cardNumber;
        $this->typeAccount = $typeAccount;
        $this->direction = $direction;
    }
}