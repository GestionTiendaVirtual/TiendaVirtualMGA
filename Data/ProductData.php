<?php

include_once 'Data.php';
include_once '../Domain/Product.php';

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
        $resultID = mysqli_query($conn, "SELECT * FROM tbproducto ORDER BY idProducto DESC LIMIT 1");
        $row = mysqli_fetch_array($resultID);
        if (sizeof($row) >= 1) {
            $id = $row['idProducto'] + 1;
        } else {
            $id = 1;
        }
        //Se realiza el insert en la base de datos
        $queryInsert = mysqli_query($conn, "insert into tbproducto values (" . $id . ",'" . $product->getBrand() . "','" .
                $product->getModel() . "'," .
                $product->getPrice() . ",'" . $product->getDescription() . "', 1, 1, "
                . "'" . $product->getColor() . "', '" . $product->getName() . "');");

        $resultIDNew = mysqli_query($conn, "SELECT * FROM tbproducto ORDER BY idProducto DESC LIMIT 1");
        $rowNew = mysqli_fetch_array($resultIDNew);
        $idNew = $rowNew['idProducto'];
        for ($i = 0; $i < sizeof($arrayImages); $i++) {
            $queryInsertImages = mysqli_query($conn, "insert into `tbimagenproducto` "
                    . "(`idImagen`, `RutaImagen`, `idProducto`) VALUES (NULL, "
                    . "'" . $arrayImages[$i] . "', " . $idNew . ");");
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
        $result = mysqli_query($conn, "select * from tbproducto order by marca asc");
        $array = array();
        while ($row = mysqli_fetch_array($result)) {
            $currentData = new Product($row['Marca'], $row['Modelo'], $row['Precio'], $row['color'], $row['descripcion'], $row['nombreProducto']);
            $currentData->setIdProduct($row['idProducto']);

            $idProduct = $row['idProducto'];
            $resultImage = mysqli_query($conn, "select * from tbimagenproducto where idProducto = " . $idProduct);
            while ($rowImage = mysqli_fetch_array($resultImage)) {
                $currentData->setPathImages($rowImage['RutaImagen']);
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
        $queryUpdate = mysqli_query($conn, "update tbproducto set Marca = '" . $product->getBrand() . "', Modelo = '" .
                $product->getModel() . "', Precio = " .
                $product->getPrice() . ", color = '" . $product->getColor() . "' , "
                . "descripcion = '" . $product->getDescription()
                . "', nombreProducto = '" . $product->getName() . "' where tbproducto.idProducto = " . $product->getIdProduct() . ";");
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
        $queryDeleteImage = mysqli_query($conn, "delete from tbimagenproducto where idProducto = " . $idProduct . ";");
        $queryDelete = mysqli_query($conn, "delete from tbproducto where idProducto = " . $idProduct . ";");
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
        $queryDeleteImage = mysqli_query($conn, "delete from tbimagenproducto where idProducto = " . $idProduct . " and rutaImagen = '" . $path . "';");

        mysqli_close($conn);

        if ($queryDeleteImage == true) {
            return true;
        } else {
            return false;
        }
    }

//fin función deleteProduct

    function insertImageProduct($idProduct,$arrayPath) {
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        for ($i = 0; $i < sizeof($arrayPath); $i++) {
            $queryInsertImages = mysqli_query($conn, "insert into `tbimagenproducto` "
                    . "(`idImagen`, `RutaImagen`, `idProducto`) VALUES (NULL, "
                    . "'" . $arrayPath[$i] . "', " . $idProduct . ");");
        }
        mysqli_close($conn);
        if ($queryInsertImages == true) {
            return true;
        } else {
            return false;
        }
    }

//fin función deleteProduct
}
