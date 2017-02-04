<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Clientes</title>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="../JS/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script>
            $(function () {
                $(".datepicker").datepicker({changeMonth: true, changeYear: true});
            });

        </script>
        
    </head>
    <body>
        <!-- Menu -->
        <b><a href="../../index.php">Inicio</a></b>&nbsp;&nbsp;&nbsp;&nbsp;
        <br> <a href="">Cliente</a>
        <!-- Fin menu -->

        <h1>Cliente</h1>
        <!--------------------------------------------------------------------->    
        <!-- Listado de Movils para eliminarlas-->
        
        <?php
        include '../../Business/Client/clientBusiness.php';
        $clientBusiness = new clientBusiness();
        $result = $clientBusiness->getClient();
        foreach ($result as $tem) {
            echo'<form id="clients" method="POST" action="../../Business/Client/clientUpdateDeleteAction.php">                                
                    <input type="hidden" id="idClient" name="idClient" value=' . $tem->idClient . '>
                    <input type="text" id="emailClient" name="emailClient" value= ' . $tem->emailClient . '> 
                    <input type="text" id="userClient" name="userClient" size="10" maxlength="15" value= ' . $tem->userClient . '> 
                    <input type="password" id="passwordClient" name="passwordClient" size="10" maxlength="15" value= ' . $tem->passwordClient . '>                                       
                    <input type="text" id="nameClient" name="nameClient" size="10" maxlength="15" value= ' . $tem->nameClient . '> 
                    <input type="text" id="lastNameFClient" name="lastNameFClient"size="10" maxlength="15" value= ' . $tem->lastNameFClient . '> 
                    <input type="text" id="lastNameSClient" name="lastNameSClient" size="10" maxlength="15" value= ' . $tem->lastNameSClient . '>
                    <input type="text" id="bornClient'.$tem->idClient.'" name="bornClient" size="10" maxlength="15" class="datepicker'.$tem->idClient.'" value= ' . $tem->bornClient . '>
                    <input type="text" id="sexClient" name="sexClient" value= ' . $tem->sexClient . '> 
                    <input type="text" id="telephoneClient" name="telephoneClient" value= ' . $tem->telephoneClient . '><br>
                    <input type="text" id="provinceClient" name="provinceClient" value= ' . $tem->provinceClient . '> 
                    <input type="text" id="cantonClient" name="cantonClient" value= ' . $tem->cantonClient . '> 
                    <input type="text" id="districtClient" name="districtClient" value= ' . $tem->districtClient . '> 
                    <input type="text" id="addressClient1" name="addressClient1" value= ' . $tem->addressClient1 . '>                        
                    <input type="text" id="addressClient2" name="addressClient2" value= ' . $tem->addressClient2 . '>                        
                    <input type="submit" id="update" name="update" value="Actualizar" />
                    <input type="submit" id="delete" name="delete" value="Desactivar" />
                    <label id="txtMessage2"></label>                    
            </form>';
        }
        ?>
        <!-- Form -->
        <form id="createClient" method="POST" action="../../Business/Client/clientInsertAction.php">
            <h1>Registro de Nuevo Usuario</h1>
            <h3>Usuario</h3>
            <input type="email" id="txtEmailClient" name="txtEmailClient" 
                   data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$"
                   placeholder="E-mail"> *

            <input type="text" id="txtUserClient" name="txtUserClient" 
                   data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$"
                   placeholder="Usuario" size="10" maxlength="15"> *

            <input type="password" id="txtPasswordClient" name="txtPasswordClient" 
                   data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$"
                   placeholder="Clave" size="10" maxlength="15"> *
            <br><h3>Nombre</h3>            
            <input type="text" id="txtNameClient" name="txtNameClient" 
                   data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$"
                   placeholder="Nombre"> *

            <input type="text" id="txtLastNameFClient" name="txtLastNameFClient" 
                   data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$"
                   placeholder="Primer Apellido"> *

            <input type="text" id="txtLastNameSClient" name="txtLastNameSClient" 
                   data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$"
                   placeholder="Segundo Apellido"> *
            
            <h3>Datos</h3>
            <input type="text" name="bornClient" size="10" maxlength="15" class="datepicker">
            <select name="cbTypeProduct" id="cbSexClient">
                <?php
                $result2 = $clientBusiness->getSexualPreferences();
                foreach ($result2 as $sexClie) {
                    echo '<option value=' . $sexClie->getNameSexPreferences() . '>' .
                    $sexClie->getNameSexPreferences() . '</option>';
                }
                ?>
            </select>
            <h3>Direcci&#243;n</h3> 
            <?php          
            $result3 = $clientBusiness->getProvince();
            ?>
            <select id="cbProvinceClient">
                <option>Provincia</option>
                <?php
                foreach ($result3 as $province) {
                    echo '<option value=' . $province->getId() . '>' . $province->getName() . '</option>';
                }
                ?>                        
            </select>
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $result4 = $clientBusiness->getCanton($id);
            ?> 
            <select id="canton">
                <option>Cant&#243;n</option>
                <?php
                foreach ($result as $currentProduct) {
                    ?>   
                    <option value="<?php echo $currentProduct->getIdCanton(); ?>"/>
                    <?php echo $currentProduct->getNameCanton(); ?></option>

                    <?php
                }
                ?>
            </select>
            <?php
            }
            if (isset($_GET['id2'])) {
                $id2 = $_GET['id2'];
                include_once '../Data/DirectionClientData.php';
                $direction = new DirectionClientData();
                $result = $direction->getDistrict($id2);
                ?>
                <br></br>
                <h3>Seleccione el distrito:</h3>
                <select id="district">
                    <option>--seleccione--</option>
                    <?php
                    foreach ($result as $currentProduct) {
                        echo '<option value=' . $currentProduct->getIdDistrict() . '/>' .
                        $currentProduct->getNameDistrict() . '</option>';
                    }
                    ?>
                </select>
                <?php
            }
            ?>


            
            <input type="text" id="txtAddressClient1" name="txtAddressClient1" placeholder="Barrio"> 
            <input type="text" id="txtAddressClient2" name="txtAddressClient2" placeholder="Localizacion"> 
            
            <input  type="submit" id="btnInsert" name="btnInsert" value="Insertar" >
            
            <br><label id="txtMessage">* campo obligatorio</label>
        </form>
        <!-- Fin del form -->
        
        <script>
            $(document).ready(function () {

                $("#province").change(function () {
                    var id = $('select[id=province]').val();
                    window.location = "./DirectionClient.php?id=" + id;
                });
                $("#canton").change(function () {
                    
                    var id2 = $('select[id=canton]').val();
                    window.location = "./DirectionClient.php?id2="+ id2;
                });
                $("#district").change(function () {
                    var id3 = $('select[id=district]').val();
                    window.location = "./DirectionClient.php?id3=" + id3;
                });
            });
        </script>
    </body>
    <?php
if (isset($_GET['InsertClientComplete'])) {
    echo '<script>                        
             document.getElementById("txtMessage").innerHTML = "Registro con éxito";
          </script>';
} else if (isset($_GET['error2'])) {
    echo '<script>                
              document.getElementById("txtMessage").innerHTML = "Registro fallido, por favor Verifique sus datos";
          </script>';
} else if (isset($_GET['error1'])) {
    echo ' <script>                
               document.getElementById("txtMessage").innerHTML = "Error con los datos ingresados";
           </script>';
} 




else if (isset($_GET['errorExis'])) {
    echo ' <script>                
               document.getElementById("txtMessage").innerHTML = "La imagen ingresada ya existe";
           </script>';
} else if (isset($_GET['errorSize'])) {
    echo ' <script>                
               document.getElementById("txtMessage").innerHTML = "La imagen supera el tamaño permitido";
           </script>';
}
?>

    
</html>
        

