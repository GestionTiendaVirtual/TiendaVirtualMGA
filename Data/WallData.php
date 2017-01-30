<?php 
include_once 'Data.php';
include '../../Domain/Comment.php';

class WallData extends Data {

    function getAllComments($idTypeProduct){
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $query = "select * from tbcomment where idProduct = $idTypeProduct";
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        $array = [];
        while ($row = mysqli_fetch_array($result)) {
            echo $row['commentProduct'];
            echo '<br></>';
            $comment = new  Comment($row['idComment'], $row['idProduct'], $row['commentProduct']);
            array_push($array, $comment);
        }
        return $array;
    }


    function insertComment($idProduct,$commentProduct,$idClient){
        echo $commentProduct;
        echo $idProduct;
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $query= "SELECT MAX(idComment) from tbcomment";
        $result = mysqli_query($conn, $query);
        $row = $result->fetch_assoc();
        $valor= $row['MAX(idComment)']+1;
        $date= date('Y-m-d');
        $query2="INSERT INTO tbcomment VALUES($valor,$idProduct,'$commentProduct',$idClient,'$date')";
        //$query2 = "INSERT into tbcomment (idComment,idProduct,commentProduct) VALUES ($valor,comment->idProduct,comment->commentProduct)";
        $result2 = mysqli_query($conn, $query2);
        mysqli_close($conn);

    

    }
}

    

?>