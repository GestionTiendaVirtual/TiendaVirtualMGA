<?php
include_once 'Data.php';
//include '../Domain/Product.php';
/**
 * Descripcion de ProductData
 * Clase donde se realizan las conexiones con la base de datos, 
 * para llevar a cabo el CRUD que corresponde a Productos 
 * @author Michael Meléndez Mesén
 */
class ProductData extends Data {
    
   
    function insertProduct($product){
        $conn = new mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $resultID = mysqli_query($conn, "select * from producto order by desc limit 1;");
        $row = mysqli_fetch_array($resultID);
        $id = $row['idProducto'] + 1;
        $queryInsert = mysqli_query($conn,
                "insert into product values (".$id.",".$product->getBrand().",".$product->getModel().",".
                $product->getPrice().",".$product->getColor().";)");
        mysqli_close($conn);
        if($queryInsert){
            return true;
        }else {
            return false;
        }
        
    }
    
}
