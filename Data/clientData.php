<?php

include_once  'Data.php';
include_once  '../../Domain/client.php';
include_once '../../Domain/sexualPreferences.php';
include_once '../../Domain/District.php';
include_once '../../Domain/Canton.php';
include_once '../../Domain/Province.php';

/**
 * Descripcion de clientData
 * Clase donde se realizan las conexiones con la base de datos, 
 * para llevar a cabo el CRUD que corresponde a client
 * @author Alberth Calderon Alvarado
 */
class clientData extends Data {
    
    /*
     * Función que permite el registro de los clientes en la base de datos
     * primero consulta el id para crear un consecutivo y luego registra el nuevo
     * @param type $client
     * @return boolean
     */
    function insertClient($client) {
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        //Se consulta por el ultimo id registrado para generar el consecutivo
        $resultID = mysqli_query($conn, "select * from tbclient order by idclient desc limit 1");
        $row = mysqli_fetch_array($resultID);
        if (sizeof($row) >= 1) {
            $id = $row['idClient'] + 1;
        } else {
            $id = 1;
        }
        //Se realiza el insert en la base de datos
        $queryInsert = mysqli_query($conn, "insert into tbclient values (". 
                $id . ",'" .
                $client->getNameClient() . "','" .
                $client->getLastNameFClient() . "','" .
                $client->getLastNameSClient() . "','" . 
                $client->getEmailClient() . "','" .
                $client->getUserClient() . "','" . 
                $client->getPasswordClient() . "','" . 
                $client->getAddressClient() .  
                "',1)");
        mysqli_close($conn);
        if ($queryInsert) {
            return true;
        } else {
            return false;
        }
    }//fin function insertProduct

    /**
     * Función que permite la obtención de todos los registros de 
     * clientes de la base de datos
     * @return array
     */
    function getClient() {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select * from tbclient where active=1 order by idclient asc");
        $array = array();
        while ($row = mysqli_fetch_array($result)) {
            $currentData = new client($row['emailClient'], $row['userClient'],$row['passwordClient'],
                    $row['nameClient'], $row['surname1Client'], $row['surname2Client'],
                    $row['bornClient'],$row['sexClient'],$row['telephoneClient'],
                    $row['provinceClient'],$row['cantonClient'],$row['districtClient'],
                    $row['addressClient1'],$row['addressClient2']);
            array_push($array, $currentData);
        }
        return $array;
    }//fin función getClient
    
    /*
     * Función que permite la obtención de todos los registros de 
     * preferencias sexuales de la base de datos 
     * @return array
     */
    function getSexualPreferences() {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select * from tbsexualpreferences order by idSex asc");
        $array = array();
        while ($row = mysqli_fetch_array($result)) {
            $currentData = new SexualPreferences ($row['idSex'], $row['nameSex']);
            array_push($array, $currentData);
        }
        return $array;
    }//fin función getClient

    /*
     * Función que permite la actualización de un tipo de producto en la base de datos
     */

    function updateClient($client) {

        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        //Se realiza la actualizacion en la base de datos
        $queryUpdate = mysqli_query($conn, "update tbclient set nameClient = '"
                . $client->getNameClient() . "',surname1Client = '"
                . $client->getLastNameFClient() . "',surname2Client = '"
                . $client->getLastNameSClient() . "',emailClient = '"
                . $client->getEmailClient() . "',userClient = '"
                . $client->getUserClient() . "',passwordClient = '"
                . $client->getPasswordClient() . "',addressClient = '"
                . $client->getAddressClient() . "' where tbclient.idClient = "
                . $client->getIdClient() . ";");
        mysqli_close($conn);

        if ($queryUpdate) {
            return true;
        } else {
            return false;
        }
    }//fin función updateClient

    /*
     * Función que permite realizar la eliminación de algun registro de clientes en la base de datos
     * @param type $idClient
     * @return boolean
     */
    function deleteClient($idClient) {

        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        //Se realiza la eliminación en la base de datos
        $queryDelete = mysqli_query($conn, "update tbclient set active=0 where idClient = '"
                . $idClient . "';");
        mysqli_close($conn);

        if ($queryDelete) {
            return true;
        } else {
            return false;
        }
    }//fin función deleteClient    
    
    /**
     * Metodo que obtiene las provincias de la base de datos
     * y las devuelve a la capa business en un array
     * @return array lista de provincias incluye id y nombre
     */
    function getProvince(){             
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn,"select * from tbprovince;");
        $array = array();
        while ($row = mysqli_fetch_array($result)) {
            $currentData =new Province();
            $currentData->setNameProvince($row['nameProvince']);
            $currentData->setIdProvince($row['idProvince']);
            array_push($array, $currentData);
        }
        return $array;
    }// fin de la funcion obtener provinncias
    
    /**
     * Metodo que obtiene los cantones de la base de datos,
     * recibe el id de provincia
     * y devuelve a la capa business en un array 
     * @param type $id que es el idProvince
     * @return array lista de cantones incluye id y nombre
     */
    function getCanton($id) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select  * from `tbcanton` where idProvince = " .$id. " order by idCanton asc;");        
        $array = array();
        while ($row = mysqli_fetch_array($result)) {
            $currentData =new Canton();
            $currentData->setIdCanton($row['idCanton']);
            $currentData->setIdProvince($row['idProvince']);
             $currentData->setNameCanton($row['nameCanton']);
            array_push($array, $currentData);
        }
        mysqli_close($conn);
        return $array;
    }// fin de la funcion obtener cantones
    
    /**
     * Metodo que obtiene los distritos de la base de datos,
     * recibe el id de canton
     * y devuelve a la capa business en un array 
     * @param type $idCanton
     * @return array
     */
     function getDistrict($idCanton) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select  * from `tbdistrict` where idCanton = " .$idCanton. " order by idCanton asc;");        
        $array = array();
        while ($row = mysqli_fetch_array($result)) {
            $currentData =new District();
            $currentData->setIdDistrict($row['idDistrict']);
             $currentData->setNameDistrict($row['nameDistrict']);
            $currentData->setIdCanton($row['idCanton']);
          
            array_push($array, $currentData);
        }
        mysqli_close($conn);
        return $array;
    }//fin dela funcion obtener distritos
    /**
     * Metodo que obtiene consulta si un email existe ya registrado
     * @param type $emailNew
     * @return type
     */
    function getEmailExist($emailNew){
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $consulting = mysqli_query($conn, 
                "select count(emailClient) as total from tbclient where emailClient =" .
                $emailNew );
        $data=mysqli_fetch_assoc($consulting);
        return($data['total']>=1); 
    }

}//fin de la clase
//como arroz
