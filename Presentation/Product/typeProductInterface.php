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
                ' . $tem->idTypeProduct .'
                    <input type="hidden" id="idType" name="idType" value=' . $tem->idTypeProduct .'> 
                    <input type="text" id="txtNameType" name="txtNameType" value= '.$tem->nameTypeProduct.'> &nbsp;
                    <input type="submit" name="update" value="Actualizar" />&nbsp;
                    <input type="submit" name="delete" value="Eliminar" />
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
                            <input type="text" id="txtNameTypeProductInsert"name="txtNameTypeProductInsert" 
                                   data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$"
                                   placeholder="Digite el nombre aqui"> &nbsp;&nbsp;                       

                            <input  type="submit" id="btnAccept" name="btnAccept" value="Insertar" >
                        </blockquote>

                    </td>
                </tr>    
            </table>
        </form>





        <!-- Fin del form -->

