<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Actualizar Productos</title>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
        <script src="../../JS/GenerateFields.js" type="text/javascript"></script>
    </head>
    <body>
        <?php
        include '../../Business/Product/ProductBusiness.php';
        $productBusiness = new ProductBusiness();
        $products = $productBusiness->getProducts();
        ?>
    <center>
        <br>
        <table>
            <tr>
                <td><a href="../../index.php">Inicio</a></td>
                <td><a href="ProductCreate.php">Registrar</a></td>
                <td><a href="ProductRetrieve.php">Visualizar</a><td>
                <td><a href="ProductUpdate.php">Actualizar</a><td>
                <td><a href="ProductDelete.php">Eliminar</a><td>
            </tr>
        </table>
        <hr>
        <h1>Actualizar Producto</h1>
        <br>        
        <table>
            <th>Nombre</th>
            <th>Marca</th>            
            <th>Modelo</th>
            <th>Precio ₡</th>
            <th>Color</th>           
            <th>Descripción</th>           
            <?php
            foreach ($products as $currentProducts) {
                $count = sizeof($currentProducts->getPathImages());
                ?>
            <form id="updateproduct" method="POST" action="../../Business/Product/ProductAction.php">
                    <tr>
                    <input type="hidden" id="idProduct" name='idProduct' 
                           value=<?php echo '"' . $currentProducts->getIdProduct() . '"'; ?>/>
                    <td><input type="text" id="txtName" name="txtName" 
                               data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$"
                               value= <?php echo '"' . $currentProducts->getName() . '"'; ?>></td>
                    <td><input type="text" id="txtBrand" name="txtBrand" 
                               data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$"
                               value= <?php echo '"' . $currentProducts->getBrand() . '"'; ?>></td>
                    <td><input type="text" id="txtModel" name="txtModel"
                               data-validation="alphanumeric" data-validation-allowing="-_"
                               value= <?php echo '"' . $currentProducts->getModel() . '"'; ?>/></td>
                    <td><input type="text" id="txtPrice" name="txtPrice" onkeypress="mascara(this, cpf)"  
                               value= <?php
                               $price = number_format($currentProducts->getPrice());
                               echo '"' . $price . '"';
                               ?>/></td>
                    <td><input type="text" id="txtColor" name="txtColor" 
                               data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$"
                               value= <?php echo '"' . $currentProducts->getColor() . '"'; ?>/></td>
                    <td><input type="text" id="txtDescription" name="txtDescription"                                
                               value= <?php echo '"' . $currentProducts->getDescription() . '"'; ?>/></td> 
                    <input type="hidden" id="optionUpdate" name="optionUpdate" value="update">
                    <td><input type="submit" id="btnAccept" name="btnAccept" value="Actualizar" /></td>  
                    <?php
                    if ($count <= 5) {
                        ?>
                        <td><a href="ProductInsertImage.php?nameProduct=<?php echo $currentProducts->getName();
                        ?>&idProduct=<?php echo $currentProducts->getIdProduct(); ?>&count=<?php echo $count; ?>">Agregar imagen</a></td>
                            <?php
                        }
                        ?>

                    </tr>   
                </form>
                <tr>
                    <?php
                    foreach ($currentProducts->getPathImages() as $path) {
                        ?>
                <form method="POST" action="../../Business/Product/ProductAction.php">
                        <td><img style="width: 150px; height: 100px;"src="<?php echo $path; ?>">&emsp;&emsp;<br>
                            <input type="submit" value="Eliminar"></td>
                        <input type="hidden" id="idProduct" name='idProduct' 
                               value=<?php echo '"' . $currentProducts->getIdProduct() . '"'; ?>/>     
                        <input type="hidden" id="path" name="path" value="<?php echo $path; ?>" />     
                        <input type="hidden" id="optionDeleteImg" name="optionDeleteImg" value="delete" />     
                    </form>
                    <?php
                }
                ?>
                </tr> 
                <?php
            }
            ?>
        </table>
        <label id="txtMessage"></label>

    </center>
</body>
<?php
if (isset($_GET['success'])) {
    echo '<script>                        
             document.getElementById("txtMessage").innerHTML = "Actualización con éxito";
          </script>';
} else if (isset($_GET['errorUpdate'])) {
    echo '<script>                
              document.getElementById("txtMessage").innerHTML = "Actualización fallida";
          </script>';
} else if (isset($_GET['errorData'])) {
    echo ' <script>                
               document.getElementById("txtMessage").innerHTML = "Error con los datos ingresados";
           </script>';
}
?>
<script>
    $.validate({
        lang: 'es'
    });
</script>
</html>
