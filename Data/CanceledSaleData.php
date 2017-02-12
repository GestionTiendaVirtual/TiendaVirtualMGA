<?php
/**
* Consultas a la tabla de compras canceladas
*/
include_once 'Data.php';

class CanceledSaleData extends Data{
	
	function insertCanceledSaleData($canceledSale)
	{
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $query = "INSERT INTO `tbcanceledsales`(`idcanceledsales`, `idclient`, `idproduct`) VALUES (NULL,".$canceledSale->idClient.",".$canceledSale->idProduct.")";
        
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        return "idClient: " . $canceledSale->idClient . "  idProduct: " . $canceledSale->idProduct;		
	}
}

?>