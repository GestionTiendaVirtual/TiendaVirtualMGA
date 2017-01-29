<?php
include_once 'Data.php';
	class Frecuency extends Data{

		function createFrecuency(){
		
		$conn = new mysqli($this->server, $this->user, $this->password, $this->db);
                $conn->set_charset('utf8');
                $query= "SELECT MAX(idfrecuency) from tbfrecuency";
                 $result = mysqli_query($conn, $query);
                $row = $result->fetch_assoc();
                $valor= $row['MAX(idfrecuency)']+1;
                session_start();
		$idClient = $_SESSION["idUser"];
		$date= date('Y-m-d');
                $contador=0;
       

                $query2= "INSERT INTO tbfrecuency values($valor,'$date',$idClient,$contador,$contador,$contador)";
                $result2 = mysqli_query($conn, $query2);
                mysqli_close($conn);
		}

                function updateWall(){
                        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
                         $conn->set_charset('utf8');
                         $query= "SELECT MAX(idfrecuency) from tbfrecuency";
                        $result = mysqli_query($conn, $query);
                        $row = $result->fetch_assoc();
                        $valor= $row['MAX(idfrecuency)'];
                        $query2="Update tbfrecuency Set participationwall=participationwall+1 Where idfrecuency=$valor";
                        $result2 = mysqli_query($conn, $query2);
                        mysqli_close($conn);
                }


	}




?>