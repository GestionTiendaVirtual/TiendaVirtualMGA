<<?php 
/**
 * Descripcion de Computer
 * Clase donde se maneja el objeto Computer,
 * @author Alberth Calderon Alvarado
 */

class Computer
{
    public $idComputer;
    public $nameComputer;
    public $ramMemory; 
    public $operativeSystem; 
    public $hardDisk;
    public $sizeDisplay;
    public $videoTarjet;
    public $wifi;
    public $battery;
    public $other;

    public function Computer(
        $idComputer,
        $nameComputer,
        $ramMemory,
        $operativeSystem, 
        $hardDisk,
        $sizeDisplay,
        $videoTarjet,
        $wifi,
        $battery,
        $other)
    {
        $this->$idComputer = $idComputer;
        $this->$nameComputer = $nameComputer;
        $this->$ramMemory = $ramMemory;
        $this->$operativeSystem = $operativeSystem;
        $this->$hardDisk = $hardDisk;
        $this->$sizeDisplay = $sizeDisplay;
        $this->$videoTarjet = $videoTarjet;
        $this->$wifi = $wifi;
        $this->$battery = $battery;
        $this->$other = $other;
    }
}
