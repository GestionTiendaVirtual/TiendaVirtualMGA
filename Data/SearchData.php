<?php
include_once 'Data.php';
include '../../Domain/Product.php';
class SearchData extends Data{
	
    /*
    * Busca coincidencias para autocompletar
    */
    public function searchProductAutompleteData($termSearch) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select * from tbproduct  JOIN tbtypeproduct  ON tbproduct.idtypeproduct = tbtypeproduct.idtypeproduct where ( model like '%" . $termSearch . "%' or brand like '%" . $termSearch . "%'  or nameProduct like '%" . $termSearch . "%') && tbproduct.active = 1");
        $arrayProduct = array();

        while ($row = mysqli_fetch_array($result)) {
            /*Se crean los objetos de los productos y se agregan al array $arrayProduct */
            $currentData = new Product($row['brand'], $row['model'],$row['price'], $row['color'], $row['description'], $row['nameProduct']);
            $idProduct = $row['idProduct'];
            $currentData->setIdProduct($idProduct);
            $currentData->setTypeProduct($row['nameTypeProduct']);
            
            array_push($arrayProduct, $currentData);
            /* Se terminan de agregar los productos al array. */
        }

        return $arrayProduct; //Se retornan todos los productos relacionados
    }
    /*Fin del metodo de busqueda para autocomplete.*/


	/* Busca todos los productos en relacion a un producto */
    public function searchProductData($termSearch) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select * from tbproduct where ( model like '%" .
         $termSearch . "%' or brand like '%" . $termSearch . "%'  or nameProduct like '%" . $termSearch . "%') && active = 1");
        $arrayProduct = array();

        while ($row = mysqli_fetch_array($result)) {
            /*Se crean los objetos de los productos y se agregan al array $arrayProduct */
            $currentData = new Product($row['brand'], $row['model'],$row['price'], $row['color'], $row['description'], $row['nameProduct']);
            $idProduct = $row['idProduct'];
            $currentData->setIdProduct($idProduct);
            
            $resultImage = mysqli_query($conn, "select * from tbimageproduct where idproduct = " . $idProduct);
            if ($rowImage = mysqli_fetch_array($resultImage)) {
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
        $query = "select max(idsearch) from tbsearch";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        $cont = $row[0]+1; 
        
        foreach ($arraySearch as $tem) {
        	$query = "insert into tbsearch (`idsearch`,`idproduct`, `idclient`) values (".$cont."," . $tem->getidProduct() . "," . $_SESSION["idUser"] . ");";
            $result = mysqli_query($conn, $query);
            $cont ++;
        }
        
        mysqli_close($conn);
        return true;
    }
}
