<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Registar Producto</title>          
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    </head>
    <body>
    <center>
        <br>
        <hr>
        <h1>Registar Producto</h1>
        <br>
        <form id="createProduct" method="POST" action="../Business/ProductInsertAction.php">
            <table>
                <tr>
                    <td><label id="txtBrand" >Marca:</label></td>
                    <td><input type="text" id="txtBrand" name="txtBrand" 
                               data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$"></td>                     
                </tr>
                <tr>
                    <td><label id="txtModel">Modelo:</label></td>
                    <td><input type="text" id="txtModel" name="txtModel"
                               data-validation="alphanumeric" data-validation-allowing="-_"/></td
                </tr>
                <tr>
                    <td><label id="txtPrice">Precio:</label></td>
                    <td><input type="number" id="txtPrice" name="txtPrice" data-validation="number"/></td>                    
                </tr>
                <tr>
                    <td><label id="txtColor">Color:</label></td>
                    <td><input type="text" id="txtColor" name="txtColor" 
                               data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$"/></td>
                </tr>   

            </table>
            <input type="submit" id="btnAccept" name="btnAccept" value="Aceptar" />
        </form>
        <br>
        <label id="txtMessage"></label>
        <hr>
    </center>
</body>
<?php
if (isset($_GET['success'])) {
    echo '<script>                        
             document.getElementById("txtMessage").innerHTML = "Registro con éxito";
          </script>';
} else if (isset($_GET['errorInsert'])) {
    echo '<script>                
              document.getElementById("txtMessage").innerHTML = "Registro fallido";
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
