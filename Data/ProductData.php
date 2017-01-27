<?php

include_once 'Data.php';
include_once '../../Domain/Product.php';
include_once '../../Domain/typeProduct.php';

/**
 * Descripcion de ProductData
 * Clase donde se realizan las conexiones con la base de datos, 
 * para llevar a cabo el CRUD que corresponde a Productos 
 * @author Michael Meléndez Mesén
 */
class ProductData extends Data {
    /*     * *
     * Función que permite el registro de los productos en la base de datos
     */

    function insertProduct($product, $arrayImages) {

        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        //Se consulta por el ultimo id registrado para generar el consecutivo
        $resultID = mysqli_query($conn, "SELECT * FROM tbproduct ORDER BY idProduct DESC LIMIT 1");
        $row = mysqli_fetch_array($resultID);
        if (sizeof($row) >= 1) {
            $id = $row['idProduct'] + 1;
        } else {
            $id = 1;
        }
        //Se realiza el insert en la base de datos
        $queryInsert = mysqli_query($conn, "insert into tbproduct values (" . $id . ",'" . $product->getBrand() . "','" .
                $product->getModel() . "'," .
                $product->getPrice() . ",'" . $product->getDescription() . "', 1," . $product->getTypeProduct() . " , "
                . "'" . $product->getColor() . "', '" . $product->getName() . "');");

        $resultIDNew = mysqli_query($conn, "SELECT * FROM tbproduct ORDER BY idProduct DESC LIMIT 1");
        $rowNew = mysqli_fetch_array($resultIDNew);
        $idNew = $rowNew['idProduct'];
        
        $resultID = mysqli_query($conn, "SELECT * FROM tbimageproduct ORDER BY idImage DESC LIMIT 1");
        $row = mysqli_fetch_array($resultID);
        if (sizeof($row) >= 1) {
            $id = $row['idImage'] + 1;
        } else {
            $id = 1;
        }
        
        for ($i = 0; $i < sizeof($arrayImages); $i++) {
            $queryInsertImages = mysqli_query($conn, "insert into `tbimageproduct` "
                    . "(`idImage`, `pathImage`, `idProduct`) VALUES (".$id.", "
                    . "'" . $arrayImages[$i] . "', " . $idNew . ");");
             $resultID = mysqli_query($conn, "SELECT * FROM tbimageproduct ORDER BY idImage DESC LIMIT 1");
            $rowNew = mysqli_fetch_array($resultID);
            $id = $rowNew['idImage'] + 1;
        }
        mysqli_close($conn);

        if ($queryInsert == true && $queryInsertImages == true) {
            return true;
        } else {
            return false;
        }
    }

//fin function insertProduct

    /*     * *
     * Función que permite la obtención de todos los registro de 
     * producto de la base de datos
     */

    function getProducts() {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select * from tbproduct order by brand asc");
        $array = array();
        while ($row = mysqli_fetch_array($result)) {
            $currentData = new Product($row['brand'], $row['model'], $row['price'], $row['color'], $row['description'], $row['nameProduct']);
            $currentData->setIdProduct($row['idProduct']);

            $idProduct = $row['idProduct'];
            $resultImage = mysqli_query($conn, "select * from tbimageproduct where idProduct = " . $idProduct);
            while ($rowImage = mysqli_fetch_array($resultImage)) {
                $currentData->setPathImages($rowImage['pathImage']);
            }
            array_push($array, $currentData);
        }
        return $array;
    }

//fin función getProducts

    /*     * *
     * Función que permite la actualización de un producto en la base de datos
     */

    function updateProduct($product) {

        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        //Se realiza la actualizacion en la base de datos
        $queryUpdate = mysqli_query($conn, "update tbproduct set brand = '" . $product->getBrand() . "', model = '" .
                $product->getModel() . "', price = " .
                $product->getPrice() . ", color = '" . $product->getColor() . "' , "
                . "description = '" . $product->getDescription()
                . "', nameProduct = '" . $product->getName() . "' where tbproduct.idProduct = " . $product->getIdProduct() . ";");
        mysqli_close($conn);

        if ($queryUpdate) {
            return true;
        } else {
            return false;
        }
    }

//fin función updateProduct

    /*     * *
     * Función que permite realizar la eliminación de algun registro en la base de datos
     */

    function deleteProduct($idProduct) {

        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        //Se realiza la eliminación en la base de datos
        $queryDeleteImage = mysqli_query($conn, "delete from tbimageproduct where idProduct = " . $idProduct . ";");
        $queryDelete = mysqli_query($conn, "delete from tbproduct where idProduct = " . $idProduct . ";");
        mysqli_close($conn);

        if ($queryDelete == true && $queryDeleteImage == true) {
            return true;
        } else {
            return false;
        }
    }

//fin función deleteProduct

    function deleteImageProduct($idProduct, $path) {

        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        //Se realiza la eliminación en la base de datos
        $queryDeleteImage = mysqli_query($conn, "delete from tbimageproduct where idProduct = " . $idProduct . " and pathImage = '" . $path . "';");

        mysqli_close($conn);

        if ($queryDeleteImage == true) {
            return true;
        } else {
            return false;
        }
    }

//fin función deleteProduct

    function insertImageProduct($idProduct, $arrayPath) {
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $resultID = mysqli_query($conn, "SELECT * FROM tbimageproduct ORDER BY idImage DESC LIMIT 1");
        $row = mysqli_fetch_array($resultID);
        if (sizeof($row) >= 1) {
            $id = $row['idImage'] + 1;
        } else {
            $id = 1;
        }
        for ($i = 0; $i < sizeof($arrayPath); $i++) {
            $queryInsertImages = mysqli_query($conn, "insert into `tbimageproduct` "
                    . "(`idImage`, `pathImage`, `idProduct`) VALUES (" . $id . ", "
                    . "'" . $arrayPath[$i] . "', " . $idProduct . ");");
            $resultID = mysqli_query($conn, "SELECT * FROM tbimageproduct ORDER BY idImage DESC LIMIT 1");
            $rowNew = mysqli_fetch_array($resultID);
            $id = $rowNew['idImage'] + 1;
        }
        mysqli_close($conn);
        if ($queryInsertImages == true) {
            return true;
        } else {
            return false;
        }
    }

//fin función deleteProduct


    function getTypeProduct() {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "SELECT * FROM tbtypeproduct order by idTypeProduct asc");
        $array = array();
        while ($row = mysqli_fetch_array($result)) {
            $currentData = new TypeProduct($row['NameTypeProduct']);
            $currentData->setIdTypeProduct($row['idTypeProduct']);
            array_push($array, $currentData);
        }
        return $array;
    }

    public function getProductByID($idProduct){

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "SELECT * FROM tbproduct where idProduct = " . $idProduct);
        $array = array();
        while ($row = mysqli_fetch_array($result)) {
            $currentData = new Product($row['brand'], $row['model'], $row['price'], $row['color'], $row['description'], $row['nameProduct']);
            $currentData->setIdProduct($row['idProduct']);

            $idProduct = $row['idProduct'];
            $resultImage = mysqli_query($conn, "select * from tbimageproduct where idProduct = " . $idProduct);
            while ($rowImage = mysqli_fetch_array($resultImage)) {
                $currentData->setPathImages($rowImage['pathImage']);
            }
            array_push($array, $currentData);
        }
        return $array;
    }

//fin función getTypeProducts
}
