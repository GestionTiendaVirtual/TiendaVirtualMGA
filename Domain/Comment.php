<?php 

class Comment{
	private $idComment;
	private $idProduct;
	private $commentProduct;

	function Comment($idComment,$idProduct,$commentProduct){
		$this->idComment= $idComment;
		$this->idProduct= $idProduct;
		$this->commentProduct= $commentProduct;
	}
	function getIdProduct(){
		 return $this->idProduct;
	}

	function getCommentProduct(){
		 return $this->commentProduct;
	}
	function getIdComment(){
		 return $this->idComment;
	}
}