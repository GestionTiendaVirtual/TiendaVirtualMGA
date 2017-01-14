<?php
include 'Data.php';
include '../Domain/ClientAccount.php';

/*
* ClientAccountData:
* Clase encargada de las consultas a BD referentes a la tabla 'ClientAccount' 
*/

class ClientAccountData extends Data {
	

    /* Optener un id viable para una cuenta nueva */
    public function getIDData(){
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $query = "select max(idAccount) from ClientAccount";
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        $row = mysqli_fetch_array($result);
        return $row[0]+1; #Se le suma uno para que sea el id de una nueva cuenta.
    }

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

    /* Optiene una cuenta en especifico */
    public function getClientAccountByIdData($idAccount) {
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $query = "select * from ClientAccount where idAccount = ". $idAccount;
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);

        $array = [];
        while ($row = mysqli_fetch_array($result)) {
            $myClientAccount = new  ClientAccount($row['idClient'], $row['idAccount'], $row['bank'], $row['typeAccount']);
            array_push($array, $myClientAccount);
        }
        return $array;#si no hay resultados en la BD entonces devuelve nulo
    }

    /*Inserta la nueva cuenta en la BD*/
    public function insertAccountData($idAccount, $idClient, $bank, $typeAccount){
        /* INSERT INTO `clientaccount` VALUES (3,3,'bank prueba','tipo cuenta prueba') */

        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $query = "INSERT INTO clientaccount VALUES (".$idAccount.",".$idClient.",'". $bank."','".$typeAccount."')";
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        return $idAccount;
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

    /* Actualiza la cuenta en la BD*/
    public function updateAccountData($idAccount, $idClient, $bank, $typeAccount){
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $query = "UPDATE clientaccount SET idAccount=".$idAccount.", idClient=".$idClient.
        ",bank='". $bank."',typeAccount='".$typeAccount."' where idAccount = ".$idAccount;
        
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        return $idAccount;
    }
    
}