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
}