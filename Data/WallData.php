<?php 
include_once 'Data.php';
include '../Domain/Comment.php';

class WallData extends Data {

	function getAllComments(){
		$idTypeProduct = $_POST['cbxProducto'];
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


	function insertComment(){
        /*
		$idProduct = $_POST['idProduct'];
		$comment = $_POST['comment'];
		$conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $query= "SELECT MAX(idComment) from tbcomment";
        $result = mysqli_query($conn, $query);
		$row = $result->fetch_assoc();
		$valor= $row['MAX(idComment)']+1;
		echo '<br></br>';

		$query2 = "insert into tbcomment values ($valor,$idProduct,$comment)";
        $result = mysqli_query($conn, $query2);
        mysqli_close($conn);
        */

	

	}
}

	

?>