<?php 
include "../../Data/WallData.php";

class WallBusiness extends WallData{


	public function getAllCommentBusiness(){
		return $this->getAllComments();
	}

	public function insertCommentBusiness($idProduct,$comment,$idClient){
		return $this->insertComment($idProduct,$comment,$idClient);
	}

	

}
