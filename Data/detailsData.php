<?php

include_once 'Data.php';

/**
 * Descripcion de TypeProductData
 * Clase donde se realizan las conexiones con la base de datos, 
 * para llevar a cabo el CRUD que corresponde a tipo de productos 
 * @author Alberth Calderon Alvarado
 */
class detailsData extends Data {
    /*     * *
     * Función que permite el registro de los tipos de productos en la base de datos
     * primeo consulta el id para crear un consecutivo y luego registra el nuevo
     */

    function insertDesire($idProductWish, $idclientWish) {

        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        //Se consulta por el ultimo id registrado para generar el consecutivo
        $resultID = mysqli_query($conn, "SELECT * FROM tbproductdesired ORDER BY iddesired DESC LIMIT 1;");
        $row = mysqli_fetch_array($resultID);
        if (sizeof($row) >= 1) {
            $id = $row['iddesired'] + 1;
        } else {
            $id = 1;
        }
        $consult = mysqli_query($conn, "select * from tbproductdesired where idclient=" .
                $idclientWish . " and idproduct=" . $idProductWish . ";");

        $num_rows = mysqli_num_rows($consult);
        if ($num_rows > 0) {
            return true;
        } else {
//Se realiza el insert en la base de datos
            $queryInsert = mysqli_query($conn, ("insert into tbproductdesired values ("
                    . $id . "," . $idclientWish . "," . $idProductWish .
                    ")"));

            mysqli_close($conn);

            if ($queryInsert) {
                return true;
            } else {
                return false;
            }
        }
    }

//fin function insertDeseo
    /*
     * Funcion que permite comprobar si ya existe el producto en la lista de deseos o no.
     */
    function isDesired($idProductWish, $idclientWish) {
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $consult = mysqli_query($conn, "select * from tbproductdesired where idclient=" .
                $idclientWish . " and idproduct=" . $idProductWish . ";");

        $num_rows = mysqli_num_rows($consult);
        if ($num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    //fin del metodo isDesire


    /*
     * Función que permite realizar la eliminación de algun registro en la base de datos
     */

    function deleteDesire($idProductWish, $idclientWish) {

        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        //Se realiza la eliminación en la base de datos
        $queryDelete = mysqli_query($conn, "delete from tbproductdesired where idclient="
                . $idclientWish . " and idproduct=" . $idProductWish . ";");
        mysqli_close($conn);

        if ($queryDelete) {
            return true;
        } else {
            return false;
        }
    }

//fin función deletedesire
}