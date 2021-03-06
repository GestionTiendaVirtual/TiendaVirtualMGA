<?php
include_once 'Data.php';
class SearchData extends Data{
    
    /*
    * Busca coincidencias para autocompletar
    */
    public function searchProductAutompleteData($termSearch) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $result = mysqli_query($conn, "select * from tbproduct  JOIN tbtypeproduct  ON tbproduct.idtypeproduct = tbtypeproduct.idtypeproduct where ( model like '%" . $termSearch . "%' or brand like '%" . $termSearch . "%'  or nameProduct like '%" . $termSearch . "%' or nameTypeProduct like '%" . $termSearch . "%') && tbproduct.active = 1");
        $arrayProduct = array();

        while ($row = mysqli_fetch_array($result)) {
            /*Se crean los objetos de los productos y se agregan al array $arrayProduct */

            $currentData = new Product(
                str_replace(" ", "", $row['brand']),
                str_replace(" ", "", $row['model']),
                str_replace(" ", "", $row['price']), 
                "",
                str_replace(" ", "", $row['description']),
                str_replace(" ", "", $row['nameProduct']),
                str_replace(" ", "", $row['characteristics']),
                str_replace(" ", "", $row['serie']));

            $idProduct = $row['idProduct'];
            $currentData->setIdProduct($idProduct);
            $currentData->setTypeProduct(str_replace(" ", "", $row['nameTypeProduct']));
            
            array_push($arrayProduct, $currentData);
            /* Se terminan de agregar los productos al array. */
        }

        return $arrayProduct; //Se retornan todos los productos relacionados
    }
    /*Fin del metodo de busqueda para autocomplete.*/



    private function getQuery($typeQuery, $termSearch){
        $myQuery = "select * from tbproduct  JOIN tbtypeproduct  ON tbproduct.idtypeproduct = tbtypeproduct.idtypeproduct where (";

            $term = split(" ",trim($termSearch));
                $myQuery .= " nameTypeProduct like '%" . $term[0] . "%'";
                if(count($term) > 1){
                    $myQuery .= " " . $typeQuery . " brand like '%" . $term[1] . "%'";
                    if((count($term)) > 2){
                        $myQuery .= " " . $typeQuery . " model like '%" . $term[2] . "%'";
                        if((count($term)) > 3){
                            $myQuery .= " " . $typeQuery . " nameProduct like '%" . $term[3] . "%'";
                        }
                    }
                }
            $myQuery .= " ) && tbproduct.active = 1";
            return $myQuery;
    }


    /* Busca todos los productos en relacion a un producto */
    public function searchProductData($termSearch) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $result = mysqli_query($conn, $this->getQuery("and",$termSearch));
        if(mysqli_num_rows($result) == 0){
            $result = mysqli_query($conn, $this->getQuery("or",$termSearch));
        }

        $arrayProduct = array();

        while ($row = mysqli_fetch_array($result)) {
            /*Se crean los objetos de los productos y se agregan al array $arrayProduct */
            $currentData = new Product($row['brand'], $row['model'], $row['price'], "", $row['description'], $row['nameProduct'], $row['characteristics'], $row['serie']);
            $idProduct = $row['idProduct'];
            $currentData->setIdProduct($idProduct);
            $currentData->setTypeProduct($row['nameTypeProduct']);
            
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
