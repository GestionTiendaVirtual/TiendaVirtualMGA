<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tipos de Producto</title>
    </head>
    <body>
        <!-- Menu -->
        <b><a href="../../index.php">Inicio</a></b>&nbsp;&nbsp;&nbsp;&nbsp;        
        <b><a href="">Tipos de Productos</a></b>
        <hr>

        <!-- Fin menu -->

        <h1>Tipos de Productos</h1>
        <!--------------------------------------------------------------------->    
        <!-- Listado de Movils para eliminarlas-->
        <blockquote><b>N° &nbsp; Nombre</b></blockquote> 
        <?php
        include '../../Business/TypeProduct/typeProductBusiness.php';
        $typeProductBusiness = new TypeProductBusiness();
        $result = $typeProductBusiness->getTypeProduct();

        foreach ($result as $tem) {

            echo'<form id="typeproduct" method="POST" action="../../Business/TypeProduct/typeProductDeleteUpdateAction.php">
                <blockquote> 
                
                    <input type="hidden" id="idType" name="idType" value=' . $tem->idTypeProduct . '> 
                    <input type="text" id="txtNameType" name="txtNameType" value= ' . $tem->nameTypeProduct . '> &nbsp;
                    <input type="submit" id="update" name="update" value="Actualizar" />&nbsp;
                    <input type="submit" id="delete" name="delete" value="Eliminar" />
                    <br><label id="txtMessage2"></label>
                </blockquote>
            </form>';
        }
        ?>



        <!-- Form -->
        <form id="createTypeProduct" method="POST" action="../../Business/TypeProduct/typeProductInsertAction.php">
            <table>
                <tr>
                    <td>
                        <blockquote>
                            <label> Nuevo Tipo: </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="text" id="txtNameTypeProductInsert" name="txtNameTypeProductInsert" 
                                   data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$"
                                   placeholder="Digite el nombre aqui">*&nbsp;&nbsp;                       

                            <input  type="submit" id="btnAccept" name="btnAccept" value="Insertar" >
                            <br><label id="txtMessage">* campo obligatorio</label>
                        </blockquote>

                    </td>
                </tr>    
            </table>
        </form>



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
} else if (isset($_GET['errorExist'])) {
    echo ' <script>                
               document.getElementById("txtMessage").innerHTML = "El tipo de Producto ingresado ya existe";
           </script>';
} else if (isset($_GET['errorSize'])) {
    echo ' <script>                
               document.getElementById("txtMessage").innerHTML = "La imagen supera el tamaño permitido";
           </script>';
}
?>

</html>

<!-- Fin del form -->

