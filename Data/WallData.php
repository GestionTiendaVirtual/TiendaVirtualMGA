<?php 
include_once 'Data.php';
include_once '../../Domain/Comment.php';
include_once '../../Domain/Like.php';
class WallData extends Data {

	function getAllComments($idTypeProduct){
		$conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $query = "select * from tbcomment where idproduct = $idTypeProduct";
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        $array = [];
        while ($row = mysqli_fetch_array($result)) {
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
        $query= "select max(idcomment) from tbcomment";
        $result = mysqli_query($conn, $query);
        $row = $result->fetch_assoc();
        $valor= $row['max(idcomment)']+1;
        $date= date('Y-m-d');
        $query2="insert into tbcomment values($valor,$idProduct,'$commentProduct',$idClient,'$date')";
        $state="";
        $query3="insert into tblike (iduser,state,idcomment) values($idClient,'$state',$valor)";
        $result3 = mysqli_query($conn, $query3);
        $result2 = mysqli_query($conn, $query2);
        mysqli_close($conn);

	

	}
    function getState($idClient,$idComment){ 
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $query= "select state from tblike where iduser=$idClient and idcomment=$idComment";
        $result = mysqli_query($conn, $query);
        $data=mysqli_fetch_all($result);
        return $data;
    }

     function updateLIke($idComment,$user){ 
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $query= "update tblike set state='checked' where idcomment=$idComment and iduser=$user";
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
    }

    function updateLIkeChecked($idComment,$user){ 
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $query= "update tblike set state='' where idcomment=$idComment and iduser=$user";
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
    }



    function insertNewLIke($idComment,$idClient){
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $state="checked";
        $query3="insert into tblike (iduser,state,idcomment) values($idClient,'$state',$idComment)";
        $result3 = mysqli_query($conn, $query3);
        mysqli_close($conn);

    }
}

	

?>
