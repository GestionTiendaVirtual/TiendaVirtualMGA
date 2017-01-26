<?php
include 'Data.php';
include '../../Domain/Product.php';
class SearchData extends Data{
	
	/* Busca todos los productos en relacion a un producto */
    public function searchProductData($termSearch) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select * from tbproduct where description like '%" . $termSearch . "%' OR model like '%" .
         $termSearch . "%' OR brand like '%" . $termSearch . "%'  OR nameProduct like '%" . $termSearch . "%'");
        $arrayProduct = array();

        while ($row = mysqli_fetch_array($result)) {
            /*Se crean los objetos de los productos y se agregan al array $arrayProduct */
            $currentData = new Product($row['brand'], $row['model'],$row['price'], $row['color'], $row['description'], $row['nameProduct']);
            $idProduct = $row['idProduct'];
            $currentData->setIdProduct($idProduct);
            
            $resultImage = mysqli_query($conn, "select * from tbimageproduct where idProduct = " . $idProduct);
            while ($rowImage = mysqli_fetch_array($resultImage)) {
                $currentData->setPathImages($rowImage['pathImage']);
            }
            array_push($arrayProduct, $currentData);
            /* Se terminan de agregar los productos al array. */
        }

        /*Se inserta el resultado de la busqueda en la tabla search */
        $this->insertSearchData($arrayProduct); 

        return $arrayProduct; //Se retornan todos los productos relacionados
    }
    /*Fin del metodo de busqueda de productos.*/

    public function insertSearchData($arraySearch){
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        /*Se obtiene el nuevo id*/
        $query = "select max(idSearch) from tbSearch";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        $cont = $row[0]+1; 
        
        foreach ($arraySearch as $tem) {
        	$query = "INSERT INTO tbSearch (`idSearch`,`idproduct`, `idClient`) VALUES (".$cont."," . $tem->getidProduct() . "," . $_SESSION["idUser"] . ");";
            $result = mysqli_query($conn, $query);
            $cont ++;
        }
        
        mysqli_close($conn);
        return true;
    }
}