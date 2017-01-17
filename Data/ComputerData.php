<?php
include_once 'Data.php';
include '../Domain/Computer.php';
/**
 * Descripcion de ComputerData
 * Clase donde se realizan las conexiones con la base de datos, 
 * para llevar a cabo el CRUD que corresponde a Computer
 * @author Alberth Calderon Alvarado
 */
class ComputerData extends Data {   
    
    

    /*Optiene todas las filas de la ComputerData*/
    public function getAllComputerData() {
    	$conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $query = "select * from Computer";
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        $array = [];
        while ($row = mysqli_fetch_array($result)) {
            $myComputerData = new  ComputerData(
                $row['idComputer'], 
                $row['nameComputer'],
                $row['ramMemory'], 
                $row['operativeSystem'], 
                $row['hardDisk'],
                $row['sizeDisplay'],
                $row['videoTarjet'], 
                $row['wifi'],
                $row['battery'],
                $row['other']);
            array_push($array, $myClientAccount);
        }
        return $array;
    }

    /*Inserta un nuevo cispositivo en la BD*/
    public function insertComputerData(
        $idComputer,        
        $nameComputer,
        $ramMemory,
        $operativeSystem, 
        $hardDisk,
        $sizeDisplay,
        $videoTarjet,
        $wifi,
        $battery,
        $other)
    {
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $query = "INSERT INTO computer VALUES (".$idComputer.",".$nameComputer.",'". $ramMemory."','".$operativeSystem.",".
            $hardDisk.",'". $sizeDisplay."','".$videoTarjet.",'". $wifi."','".$battery"','".$other."')";
            
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        return $result;
    }

    /*Elimina una cuenta específica*/
    /* DELETE FROM nombreTabla WHERE columna (>, <, =, etc.) valorEspecificado  */
    public function deleteComputerData($idComputer){
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $query = "DELETE FROM computer WHERE idComputer = ".$idComputer;
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        return $result;
    }
    



}