<?php
include 'Data.php';
include '../../Domain/Account.php';

/*
* AccountData:
* Clase encargada de las consultas a BD referentes a la tabla 'Account' 
*/

class AccountData extends Data {
	

    /* Optener un id viable para una cuenta nueva */
    public function getIDData(){
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $query = "select max(idCuenta) from tbCuenta";
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
             $row['idCuenta'], $row['NumeroTarjeta'], $row['TipoCuenta']);

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
             $row['idCuenta'], $row['NumeroTarjeta'], $row['TipoCuenta']);
            array_push($array, $myAccount);
        }
        return $array;#si no hay resultados en la BD entonces devuelve nulo
    }

    /*Inserta la nueva cuenta en la BD*/
    public function insertAccountData($account){
        /* INSERT INTO `clientaccount` VALUES (3,3,'bank prueba','tipo cuenta prueba') */

        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $query = "INSERT INTO `mgasolucionesdb`.`tbcuenta` (`idCuenta`, `TipoCuenta`, `NumeroTarjeta`, `FechaVencimiento`, `CSC`, `idCliente`) VALUES ('". $account->idAccount ."', '". $account->typeAccount. "', '".  $account->cardNumber ."', '". $account->expirationDate."', '". $account->CSC."', '". $account->idClient."');";
        

        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        return $account->idAccount;
    }

    /*Elimina una cuenta específica*/
    /* DELETE FROM nombreTabla WHERE columna (>, <, =, etc.) valorEspecificado  */
    public function deleteAccountData($idAccount){
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $query = "DELETE FROM tbCuenta WHERE idCuenta = ".$idAccount;
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        return $result;
    }

    /* Actualiza la cuenta en la BD*/
    public function updateAccountData($account){
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $query = "UPDATE tbCuenta SET idCuenta=".$account->idAccount.", TipoCuenta= '".$account->typeAccount.
         "', NumeroTarjeta= '".$account->cardNumber."', FechaVencimiento= '".$account->expirationDate.
         "', CSC='".$account->CSC."', idCliente= '".$account->idClient.
         "' where idCuenta = ".$account->idAccount;
        
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        return $idAccount;
    }
    
}