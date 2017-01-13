<?php
include 'Data.php';
include '../Domain/ClientAccount.php';

/*
* ClientAccountData:
* Clase encargada de las consultas a BD referentes a la tabla 'ClientAccount' 
*/

class ClientAccountData extends Data {
	
    /*Optiene todas las filas de la tabla ClientAccount*/
    public function getAllClientAccountData() {
    	$conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $query = "select * from ClientAccount";
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        $array = [];
        while ($row = mysqli_fetch_array($result)) {
            $myClientAccount = new  ClientAccount($row['idClient'], $row['idAccount'], $row['bank'], $row['typeAccount']);
            array_push($array, $myClientAccount);
        }
        return $array;
    }

    /*Inserta la nueva cuenta en la BD*/
    public function insertAccountData($idAccount, $idClient, $bank, $typeAccount){
        /* INSERT INTO `clientaccount` VALUES (3,3,'bank prueba','tipo cuenta prueba') */

        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $query = "INSERT INTO clientaccount VALUES (".$idAccount.",".$idClient.",'". $bank."','".$typeAccount."')";
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        return $result;
    }

    /*Elimina una cuenta específica*/
    /* DELETE FROM nombreTabla WHERE columna (>, <, =, etc.) valorEspecificado  */
    public function deleteAccountData($idAccount){
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $query = "DELETE FROM clientaccount WHERE idAccount = ".$idAccount;
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        return $result;
    }
    
}