<?php
include_once 'Data.php';
include '../Domain/Celphone.php';
/**
 * Descripcion de CelphoneData
 * Clase donde se realizan las conexiones con la base de datos, 
 * para llevar a cabo el CRUD que corresponde a Celphone
 * @author Alberth Calderon Alvarado
 */
class CelphoneData extends Data {   
    
    

    /*Optiene todas las filas de la CelphoneData*/
    public function getAllCelphoneData() {
    	$conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $query = "select * from celphone";
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        $array = [];
        while ($row = mysqli_fetch_array($result)) {
            $myCelphoneData = new  CelphoneData(
                $row['idCelphone'], 
                $row['nameCelphone'],
                $row['net'], 
                $row['yearCreate'], 
                $row['typeDisplay'],
                $row['sizeDisplay'],
                $row['sdMemory'], 
                $row['operativeSystem'],
                $row['camera'],
                $row['other']);
            array_push($array, $myClientAccount);
        }
        return $array;
    }

    /*Inserta un nuevo cispositivo en la BD*/
    public function insertCelphoneData(
        $idCelphone,        
        $nameCelphone,
        $net,
        $yearCreate, 
        $typeDisplay,
        $sizeDisplay,
        $sdMemory,
        $operativeSystem,
        $camera,
        $other)
    {
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $query = "INSERT INTO celphone VALUES (".$idCelphone.",".$nameCelphone.",".$net.",". $yearCreate.",".$typeDisplay.",". $sizeDisplay.",".$sdMemory.",". $operativeSystem.",".$camera",".$other.")";
            
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        return $result;
    }

    /*Elimina una cuenta específica*/
    /* DELETE FROM nombreTabla WHERE columna (>, <, =, etc.) valorEspecificado  */
    public function deleteCelphoneData($idCelphone){
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $query = "DELETE FROM celphone WHERE idCelphone = ".$idCelphone;
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        return $result;
    }
    



}