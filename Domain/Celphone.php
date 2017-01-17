<<?php 
/**
 * Descripcion de Celphone
 * Clase donde se maneja el objeto celphone,
 * @author Alberth Calderon Alvarado
 */

class Celphone
{
	public $idCelphone;
   	public $nameCelphone;
	public $net; 
    public $yearCreate; 
    public $typeDisplay;
    public $sizeDisplay;
    public $sdMemory;
    public $operativeSystem;
    public $camera;
    public $other;

    public function Celphone(
    	$idCelphone,
    	$nameCelphone,
    	$net,
    	$yearCreate, 
	    $typeDisplay,
	    $sizeDisplay,
	    $sdMemory,
	    $operativeSystem,
	    $camera,
	    $other)
    {
    	$this->$idCelphone = $idCelphone;
    	$this->$nameCelphone = $nameCelphone;
    	$this->$net = $net;
    	$this->$yearCreate = $yearCreate;
	    $this->$typeDisplay = $typeDisplay;
	    $this->$sizeDisplay = $sizeDisplay;
	    $this->$sdMemory = $sdMemory;
	    $this->$operativeSystem = $operativeSystem;
	    $this->$camera = $camera;
	    $this->$other = $other;
	}
}