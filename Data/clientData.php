<?php

include_once  'Data.php';
include_once  '../../Domain/client.php';

/**
 * Descripcion de clientData
 * Clase donde se realizan las conexiones con la base de datos, 
 * para llevar a cabo el CRUD que corresponde a client
 * @author Alberth Calderon Alvarado
 */
class clientData extends Data {
    
    /*     * *
     * Función que permite el registro de los clientes en la base de datos
     * primero consulta el id para crear un consecutivo y luego registra el nuevo
     */

    function insertClient($client) {

        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        //Se consulta por el ultimo id registrado para generar el consecutivo
        $resultID = mysqli_query($conn, "SELECT * FROM tbcliente ORDER BY idCliente DESC LIMIT 1");
        $row = mysqli_fetch_array($resultID);
        if (sizeof($row) >= 1) {
            $id = $row['idCliente'] + 1;
        } else {
            $id = 1;
        }
        //Se realiza el insert en la base de datos
        $queryInsert = mysqli_query($conn, "insert into tbcliente values (". 
                $id . ",'" .
                $client->getNameClient() . "','" .
                $client->getLastNameFClient() . "','" .
                $client->getLastNameSClient() . "','" . 
                $client->getEmailClient() . "','" .
                $client->getUserClient() . "','" . 
                $client->getPasswordClient() . "','" . 
                $client->getAddressClient() . "')");
        mysqli_close($conn);

        if ($queryInsert) {
            return true;
        } else {
            return false;
        }
    }

//fin function insertProduct

    /*     * *
     * Función que permite la obtención de todos los registros de 
     * clientes de la base de datos
     */
    function getClient() {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "SELECT * FROM tbcliente order by idcliente asc");
        $array = array();
        while ($row = mysqli_fetch_array($result)) {
            $currentData = new client($row['NombreCliente'], $row['ApellidoPCliente'], $row['ApellidoSCliente'], $row['EmailCliente'], $row['UsuarioCliente'], $row['ContrasenaCliente'], $row['DireccionCliente']);
            $currentData->setIdClient($row['idCliente']);
            array_push($array, $currentData);
        }
        return $array;
    }

//fin función getTypeProducts

    /*
     * Función que permite la actualización de un tipo de producto en la base de datos
     */

    function updateClient($client) {

        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        //Se realiza la actualizacion en la base de datos
        $queryUpdate = mysqli_query($conn, "update tbcliente set NombreCliente = '"
                . $client->getNameClient() . "',ApellidoPCliente = '"
                . $client->getLastNameFClient() . "',ApellidoSCliente = '"
                . $client->getLastNameSClient() . "',EmailCliente = '"
                . $client->getEmailClient() . "',UsuarioCliente = '"
                . $client->getUserClient() . "',ContrasenaCliente = '"
                . $client->getPasswordClient() . "',DireccionCliente = '"
                . $client->getAddressClient() . "' where tbcliente.idCliente = "
                . $client->getIdClient() . ";");
        mysqli_close($conn);

        if ($queryUpdate) {
            return true;
        } else {
            return false;
        }
    }

    //fin función updateTypeProduct

    /*
     * Función que permite realizar la eliminación de algun registro de clientes en la base de datos
     */

    function deleteClient($idClient) {

        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        //Se realiza la eliminación en la base de datos
        $queryDelete = mysqli_query($conn, "delete from tbcliente where idCliente = '"
                . $idClient . "';");
        mysqli_close($conn);

        if ($queryDelete) {
            return true;
        } else {
            return false;
        }
    }

//fin función deleteTypeProduct
}
