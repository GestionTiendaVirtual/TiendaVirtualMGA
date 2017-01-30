<?php 
include "../../Data/WallData.php";

class WallBusiness extends WallData{


	public function getAllCommentBusiness($idTypeProduct){
		return $this->getAllComments($idTypeProduct);
	}

	public function insertCommentBusiness($idProduct,$comment,$idClient){
		return $this->insertComment($idProduct,$comment,$idClient);
	}

	

}
