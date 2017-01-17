<?php
include 'Data.php';
include '../Domain/Account.php';

/*
* AccountData:
* Clase encargada de las consultas a BD referentes a la tabla 'Account' 
*/

class AccountData extends Data {
	

    /* Optener un id viable para una cuenta nueva */
    public function getIDData(){
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $query = "select max(idAccount) from tbCuenta";
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        $row = mysqli_fetch_array($result);
        return $row[0]+1; #Se le suma uno para que sea el id de una nueva cuenta.
    }

    /*Optiene todas las filas de la tabla ClientAccount*/
    public function getAllAccountData() {
    	$conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $query = "select * from tbCuenta";
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        $array = [];
        while ($row = mysqli_fetch_array($result)) {
            $myAccount = new  Account($row['CSC'], $row['FechaVencimiento'], $row['idCliente'],
             $row['idCuenta'], $row['NumeroTarjeta'], $row['tipoCuenta']);

            array_push($array, $myAccount);
        }
        return $array;
    }

    /* Optiene una cuenta en especifico */
    public function getAccountByIdData($idAccount) {
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $query = "select * from tbCuenta where idCuenta = ". $idAccount;
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);

        $array = [];
        while ($row = mysqli_fetch_array($result)) {
            $myAccount = new  Account($row['CSC'], $row['FechaVencimiento'], $row['idCliente'],
             $row['idCuenta'], $row['NumeroTarjeta'], $row['tipoCuenta']);
            array_push($array, $myAccount);
        }
        return $array;#si no hay resultados en la BD entonces devuelve nulo
    }

    /*Inserta la nueva cuenta en la BD*/
    public function insertAccountData($idAccount, $idClient, $bank, $typeAccount){
        /* INSERT INTO `clientaccount` VALUES (3,3,'bank prueba','tipo cuenta prueba') */

        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $query = "INSERT INTO tbCuenta VALUES (".$idAccount.",".$idClient.",'". $bank."','".$typeAccount."')";
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        return $idAccount;
    }

    /*Elimina una cuenta específica*/
    /* DELETE FROM nombreTabla WHERE columna (>, <, =, etc.) valorEspecificado  */
    public function deleteAccountData($idAccount){
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $query = "DELETE FROM tbCuenta WHERE idAccount = ".$idAccount;
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        return $result;
    }

    /* Actualiza la cuenta en la BD*/
    public function updateAccountData($idAccount, $idClient, $bank, $typeAccount){
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $query = "UPDATE tbCuenta SET idAccount=".$idAccount.", idClient=".$idClient.
        ",bank='". $bank."',typeAccount='".$typeAccount."' where idAccount = ".$idAccount;
        
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        return $idAccount;
    }
    
}