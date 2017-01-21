<?php
include 'Data.php';
include '../../Domain/Product.php';
class SearchData extends Data{
	
	/* Busca todos los productos en relacion a un producto */
    public function searchProductData($termSearch) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select * from tbproducto where descripcion like '%" . $termSearch . "%' OR modelo like '%" . $termSearch . "%' OR marca like '%" . $termSearch . "%'");
        $arrayProduct = array();

        while ($row = mysqli_fetch_array($result)) {
            /*Se crean los objetos de los productos y se agregan al array $arrayProduct */
            $currentData = new Product($row['Marca'], $row['Modelo'], $row['Precio'], $row['color'], $row['descripcion'], "Nombre Prducto");
            $idProduct = $row['idProducto'];
            $currentData->setIdProduct($idProduct);
            
            $resultImage = mysqli_query($conn, "select * from tbimagenproducto where idProducto = " . $idProduct);
            while ($rowImage = mysqli_fetch_array($resultImage)) {
                $currentData->setPathImages($rowImage['RutaImagen']);
            }
            array_push($arrayProduct, $currentData);
            /* Se terminan de agregar los productos al array. */
        }

        /*Se inserta el resultado de la busqueda en la tabla search */
        $this->insertSearch($arrayProduct); 

        return $arrayProduct; //Se retornan todos los productos relacionados
    }
    /*Fin del metodo de busqueda de productos.*/

    public function insertSearch($arraySearch){
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $cont = 1;
        foreach ($arraySearch as $tem) {
        	$query = "INSERT INTO tbbusqueda (`idBusqueda`,`idProducto`, `idCliente`) VALUES (".$cont."," . $tem->getidProduct() . "," . 1 . ");";
            $result = mysqli_query($conn, $query);
            $cont ++;
        }
        
        mysqli_close($conn);
        return true;
    }
}