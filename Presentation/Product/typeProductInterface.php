<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tipos de Producto</title>
    </head>
    <body>
        <!-- Menu -->
        <b><a href="../../index.php">Inicio</a></b>&nbsp;&nbsp;&nbsp;&nbsp;        
        <br><a href="">Tipos de Productos</a>
        <!-- Fin menu -->

        <h1>Tipos de Productos</h1>
        <!--------------------------------------------------------------------->    
        <!-- Listado de Movils para eliminarlas-->
        <b>Nombre</b>
        <?php
        include '../../Business/TypeProduct/typeProductBusiness.php';
        $typeProductBusiness = new TypeProductBusiness();
        $result = $typeProductBusiness->getTypeProduct();

        foreach ($result as $tem) {

            echo'<form id="typeproduct" method="POST" action="../../Business/TypeProduct/typeProductDeleteUpdateAction.php">
                    <input type="hidden" id="idType" name="idType" value=' . $tem->idTypeProduct . '> 
                    <input type="text" id="txtNameType" name="txtNameType" value= ' . $tem->nameTypeProduct . '> &nbsp;
                    <input type="submit" id="update" name="update" value="Actualizar" />&nbsp;
                    <input type="submit" id="delete" name="delete" value="Eliminar" />                
            </form>';
        }
        ?>
        <!-- Form -->
        <form id="createTypeProduct" method="POST" action="../../Business/TypeProduct/typeProductInsertAction.php">         
            <br>
            <input type="text" id="txtNameTypeProductInsert"name="txtNameTypeProductInsert" 
                   data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$"
                   placeholder="Digite el nombre aqui"> &nbsp;&nbsp;                       

            <input  type="submit" id="btnAccept" name="btnAccept" value="Insertar" >
        </form>
        <!-- Fin del form -->

