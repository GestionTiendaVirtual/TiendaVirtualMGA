<?php
/**
 * Descripcion de Data
 * Clase que permite la conexión con la base de datos
 * @author Michael Meléndez Mesén
 */
class Data {  
    
    
    /* atributos */
    public $server;
    public $user;
    public $password;
    public $db;  
    
    /* constructor */
    public function Data(){        
        $this->server = "mysql.hostinger.es";
        $this->user = "u269309626_mga";
        $this->password = "MGA123";
        $this->db = "u269309626_mgadb";
    }
    
}
?>
