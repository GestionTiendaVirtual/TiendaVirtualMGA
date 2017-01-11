<?php
class Data {  
    
    
    /* atributos */
    public $server;
    public $user;
    public $password;
    public $db;  
    
    /* constructor */
    public function Data(){        
        $this->server = "localhost";
        $this->user = "root";
        $this->password = "";
        $this->db = "";
    }
    
}
?>