<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Actualizar Productos</title>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    </head>
    <body>
        <?php
        include '../Business/ProductBusiness.php';
        $productBusiness = new ProductBusiness();
        $products = $productBusiness->getProducts();
        ?>
    <center>
        <br>
        <table>
            <tr>
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
            <th>Marca</th>
            <th>Modelo</th>
            <th>Precio ₡</th>
            <th>Color</th>           
            <?php
            foreach ($products as $currentProducts) {
                ?>
                <form id="updateproduct" method="POST" action="../Business/ProductUpdateAction.php">
                    <tr>
                    <input type="hidden" id="idProduct" name='idProduct' 
                           value=<?php echo '"' . $currentProducts->getIdProduct() . '"'; ?>/>
                    <td><input type="text" id="txtBrand" name="txtBrand" 
                               data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$"
                               value= <?php echo '"' . $currentProducts->getBrand() . '"'; ?>></td>
                    <td><input type="text" id="txtModel" name="txtModel"
                               data-validation="alphanumeric" data-validation-allowing="-_"
                               value= <?php echo '"' . $currentProducts->getModel() . '"'; ?>/></td>
                    <td><input type="number" id="txtPrice" name="txtPrice" data-validation="number" 
                               value= <?php echo '"' . $currentProducts->getPrice() . '"'; ?>/></td>
                    <td><input type="text" id="txtColor" name="txtColor" 
                               data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$"
                               value= <?php echo '"' . $currentProducts->getColor() . '"'; ?>/></td>                
                    <td><input type="submit" id="btnAccept" name="btnAccept" value="Actualizar" /></td>                
                    </tr>
                </form>
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
