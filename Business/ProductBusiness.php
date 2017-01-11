<?php
include '../Data/ProductData.php';

/**
 * Descripcion de ProductBusiness
 * Clase puente de la capa Data a Presentation de los objetos Producto 
 * @author Michael Meléndez Mesén
 */
class ProductBusiness {
    public $productData;
    
    public function ProductBusiness(){
        $this->productData = new ProductData();
        
    }
    
    public function saludar(){        
        return $this->productData->saludar();
    }
    
}
