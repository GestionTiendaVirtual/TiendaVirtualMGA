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
        $query = "select max(idAccount) from tbAccount";
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        $row = mysqli_fetch_array($result);
        return $row[0]+1; #Se le suma uno para que sea el id de una nueva cuenta.
    }

    /*Optiene todas las filas de la tabla ClientAccount*/
    public function getAllAccountAssetsData() {
    	$conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $query = "select * from tbAccount where active = 1";
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        $array = [];
        while ($row = mysqli_fetch_array($result)) {
            $myAccount = new  Account($row['CSC'], $row['DateExpiration'], $row['idClient'],
             $row['idAccount'], $row['numberCard'], $row['typeAccount']);

            array_push($array, $myAccount);
        }
        return $array;
    }

    /* Optiene una cuenta en especifico */
    public function getAccountByIdData($idAccount) {
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $query = "select * from tbAccount where idAccount = ". $idAccount . " AND active = 1";
        
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);

        $array = [];
        while ($row = mysqli_fetch_array($result)) {
            $myAccount = new  Account($row['CSC'], $row['DateExpiration'], $row['idClient'],
             $row['idAccount'], $row['numberCard'], $row['typeAccount']);
            array_push($array, $myAccount);
        }
        return $array;#si no hay resultados en la BD entonces devuelve nulo
    }

    /*Inserta la nueva cuenta en la BD*/
    public function insertAccountData($account){
        /* INSERT INTO `clientaccount` VALUES (3,3,'bank prueba','tipo cuenta prueba') */

        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $query = "INSERT INTO `mgasoluciones`.`tbAccount` (`idAccount`, `typeAccount`, `numberCard`, `DateExpiration`, `CSC`, `idClient`, `active`) VALUES ('". $account->idAccount ."', '". $account->typeAccount. "', '".  $account->cardNumber ."', '". $account->expirationDate."', '". $account->CSC."', '". $account->idClient."', 1);";
        

        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        return $account->idAccount;
    }

    /*Elimina una cuenta específica*/
    /* DELETE FROM nombreTabla WHERE columna (>, <, =, etc.) valorEspecificado  */
    public function deactivateAccountData($idAccount){
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $query = "Update tbAccount Set active = 0 WHERE idAccount = ".$idAccount;
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        return $result;
    }

    /* Actualiza la cuenta en la BD*/
    public function updateAccountData($account){
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $query = "UPDATE tbAccount SET idAccount=".$account->idAccount.", typeAccount= '".$account->typeAccount.
         "', numberCard= '".$account->cardNumber."', DateExpiration= '".$account->expirationDate.
         "', CSC='".$account->CSC."', idClient= '".$account->idClient.
         "' where idAccount = ".$account->idAccount;
        
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        return $idAccount;
    }
    
}