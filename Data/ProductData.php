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
    
    /***
     * Función que permite el registro de los productos en la base de datos
     */
    function insertProduct($product){
                
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        //Se consulta por el ultimo id registrado para generar el consecutivo
        $resultID = mysqli_query($conn, 
                "SELECT * FROM Product ORDER BY idProduct DESC LIMIT 1");
        $row = mysqli_fetch_array($resultID);
        if(sizeof($row)>= 1){            
            $id = $row['idProduct'] + 1;        
        }else{ 
            $id = 1;            
        }
        //Se realiza el insert en la base de datos
        $queryInsert = mysqli_query($conn,
                "insert into Product values (".$id.",'".$product->getBrand()."','".
                $product->getModel()."',".
                $product->getPrice().",'".$product->getColor()."');");
        mysqli_close($conn);        
        
        if($queryInsert){
            return true;
        }else {
            return false;
        }
        
    }//fin function insertProduct
    
    /***
     * Función que permite la obtención de todos los registro de 
     * producto de la base de datos
     */
    function getProducts(){     
        
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn,"SELECT * FROM Product");
        $array = array();
        while ($row = mysqli_fetch_array($result)) {
            $currentData = new Product($row['brand'], $row['model'],
                    $row['price'],$row['color']);
            $currentData->setIdProduct($row['idProduct']);
            array_push($array, $currentData);
        }
        return $array;
    }//fin función getProducts
    
    /***
     * Función que permite la actualización de un producto en la base de datos
     */
    function updateProduct($product){
        
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        //Se realiza la actualizacion en la base de datos
        $queryUpdate = mysqli_query($conn,
                "update Product set brand = '".$product->getBrand()."', model = '".
                $product->getModel()."', price = ".
                $product->getPrice().", color = '".$product->getColor()."' "
                . "where Product.idProduct = ".$product->getIdProduct().";");
        mysqli_close($conn);        
        
        if($queryUpdate){
            return true;
        }else {
            return false;
        }
    }//fin función updateProduct
    
    /***
     * Función que permite realizar la eliminación de algun registro en la base de datos
     */
    function deleteProduct($idProduct){
        
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        //Se realiza la eliminación en la base de datos
        $queryDelete = mysqli_query($conn,
                "delete from Product where idProduct = ".$idProduct.";");
        mysqli_close($conn);        
        
        if($queryDelete){
            return true;
        }else {
            return false;
        }
        
    }//fin función deleteProduct
    
    
}
