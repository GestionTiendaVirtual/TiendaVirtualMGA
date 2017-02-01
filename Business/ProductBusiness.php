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
    public function insertProduct($product,$arrayImages){
        return $this->productData->insertProduct($product,$arrayImages);
    }
    public function getProducts(){
        return $this->productData->getProducts();
    }
    public function updateProduct($product){
        return $this->productData->updateProduct($product);
    }
    public function deleteProduct($idProduct){
        return $this->productData->deleteProduct($idProduct);
    }
    public function deleteImageProduct($idProduct,$path){
        return $this->productData->deleteImageProduct($idProduct,$path);
    }
    public function insertImageProduct($idProduct,$arrayPath){
        return $this->productData->insertImageProduct($idProduct, $arrayPath);
    }
}
