<?php

/*
 * Descripcion de Tipo de producto
 * Clase donde se maneja el objeto cliente,
 * @author Alberth Calderon Alvarado
 */

class client {

    public $idClient;
    public $nameClient;
    public $lastNameFClient;
    public $lastNameSClient;
    public $emailClient;
    public $userClient;
    public $passwordClient;
    public $addressClient;

    function client($nameClient, $lastNameFClient, $lastNameSClient, $emailClient, $userClient, $passwordClient, $addressClient) {
        $this->nameClient = $nameClient;
        $this->lastNameFClient = $lastNameFClient;
        $this->lastNameSClient = $lastNameSClient;
        $this->emailClient = $emailClient;
        $this->userClient = $userClient;
        $this->passwordClient = $passwordClient;
        $this->addressClient = $addressClient;
    }

    function getIdClient() {
        return $this->idClient;
    }

    function getNameClient() {
        return $this->nameClient;
    }

    function getLastNameFClient() {
        return $this->lastNameFClient;
    }

    function getLastNameSClient() {
        return $this->lastNameSClient;
    }

    function getEmailClient() {
        return $this->emailClient;
    }

    function getUserClient() {
        return $this->userClient;
    }

    function getPasswordClient() {
        return $this->passwordClient;
    }

    function getAddressClient() {
        return $this->addressClient;
    }

    function setIdClient($idClient) {
        $this->idClient = $idClient;
    }

    function setNameClient($nameClient) {
        $this->nameClient = $nameClient;
    }

    function setLastNameFClient($lastNameFClient) {
        $this->lastNameFClient = $lastNameFClient;
    }

    function setLastNameSClient($lastNameSClient) {
        $this->lastNameSClient = $lastNameSClient;
    }

    function setEmailClient($emailClient) {
        $this->emailClient = $emailClient;
    }

    function setUserClient($userClient) {
        $this->userClient = $userClient;
    }

    function setPasswordClient($passwordClient) {
        $this->passwordClient = $passwordClient;
    }

    function setAddressClient($addressClient) {
        $this->addressClient = $addressClient;
    }

}
