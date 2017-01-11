<?php
include_once 'Data.php';
include '../Domain/Product.php';
/**
 * Descripcion de ProductData
 * Clase donde se realizan las conexiones con la base de datos, 
 * para llevar a cabo el CRUD que corresponde a Productos 
 * @author Michael Meléndez Mesén
 */
class ProductData extends Data {
    
    function saludar(){
        return 'Hola mundo';
    }
    
}
