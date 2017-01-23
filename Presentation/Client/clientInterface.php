<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Clientes</title>
    </head>
    <body>
        <!-- Menu -->
        <b><a href="../../index.php">Inicio</a></b>&nbsp;&nbsp;&nbsp;&nbsp;
        <br> <a href="">Cliente</a>
        <!-- Fin menu -->

        <h1>Cliente</h1>
        <!--------------------------------------------------------------------->    
        <!-- Listado de Movils para eliminarlas-->
        <b>Nombre</b>
        <?php
        include '../../Business/Client/clientBusiness.php';
        $clientBusiness = new clientBusiness();
        $result = $clientBusiness->getClient();
        foreach ($result as $tem) {
            echo'<form id="clients" method="POST" action="../../Business/Client/clientUpdateDeleteAction.php">                                
                    <input type="hidden" id="idClient" name="idClient" value=' . $tem->idClient . '>
                    <input type="text" id="nameClient" name="nameClient" value= ' . $tem->nameClient . '> 
                    <input type="text" id="lastNameFClient" name="lastNameFClient" value= ' . $tem->lastNameFClient . '> 
                    <input type="text" id="lastNameSClient" name="lastNameSClient" value= ' . $tem->lastNameSClient . '> 
                    <input type="text" id="emailClient" name="emailClient" value= ' . $tem->emailClient . '> 
                    <input type="text" id="userClient" name="userClient" value= ' . $tem->userClient . '> 
                    <input type="password" id="passwordClient" name="passwordClient" value= ' . $tem->passwordClient . '> 
                    <input type="text" id="addressClient" name="addressClient" value= ' . $tem->addressClient . '>                        
                    <input type="submit" id="update" name="update" value="Actualizar" />
                    <input type="submit" id="delete" name="delete" value="Eliminar" />
            </form>';
        }
        ?>
        <!-- Form -->
        <form id="createClient" method="POST" action="../../Business/Client/clientInsertAction.php"><br>
            <input type="text" id="txtNameClient" name="txtNameClient" 
                   data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$"
                   placeholder="Nombre"> 

            <input type="text" id="txtLastNameFClient" name="txtLastNameFClient" 
                   data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$"
                   placeholder="Primer Apellido"> 

            <input type="text" id="txtLastNameSClient" name="txtLastNameSClient" 
                   data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$"
                   placeholder="Segundo Apellido"> 

            <input type="email" id="txtEmailClient" name="txtEmailClient" 
                   data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$"
                   placeholder="E-mail"> 

            <input type="text" id="txtUserClient" name="txtUserClient" 
                   data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$"
                   placeholder="Usuario"> 

            <input type="password" id="txtPasswordClient" name="txtPasswordClient" 
                   data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$"
                   placeholder="Clave"> 

            <input type="text" id="txtAddressClient" name="txtAddressClient" 
                   data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$"
                   placeholder="Direccion"> 
            <input  type="submit" id="btnInsert" name="btnInsert" value="Insertar" >
        </form>
        <!-- Fin del form -->

