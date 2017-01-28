<?php 
include "../Data/WallData.php";

class WallBusiness extends WallData{


	public function getAllCommentBusiness(){
		return $this->getAllComments();
	}

	public function insertCommentBusiness(){
		return $this->insertComment();
	}

	

}
