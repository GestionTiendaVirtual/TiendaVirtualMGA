<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Obtener Cuenta</title>

        <!-- Script para eliminar el mensaje. -->
        <script type="text/javascript">
            function miFuncion()
            {
                var d = document.getElementById("close");
                while (d.hasChildNodes())
                d.removeChild(d.firstChild);
            }
        </script>

        <script>
            function valida(e){
                tecla = (document.all) ? e.keyCode : e.which;
                alert(String.fromCharCode(tecla));
                var elementoDate = document.getElementById("expirationDate").value;

                var elementoDate = document.getElementById("expirationDate").value;

                //Tecla de retroceso para borrar, siempre la permite
                if (tecla==8){
                    if(elementoDate.length == 6 || elementoDate.length == 9){
                        document.getElementById("expirationDate").value = elementoDate.substring(0, (elementoDate.length-1)); 
                    }
                    return true;
                }//Termina el borrado de una letra

                // Patron de entrada, en este caso solo acepta numeros
                patron =/[0-9]/;
                tecla_final = String.fromCharCode(tecla);

                if (patron.test(tecla_final) && elementoDate.length < 10) {
                    //Insercion de un nuevo numero
                    if(elementoDate.length == 4 || elementoDate.length == 7){
                        document.getElementById("expirationDate").value = elementoDate+"-";
                    }

                    return true;
                }
                else{ return false; }
            }
        </script>

    </head>
    <body>

        <?php
            include_once '../../Business/Account/AccountBusiness.php';
            $accountBusiness = new AccountBusiness();
            #Obtiene el id para la nueva cuenta
            $idAccount = $accountBusiness->getIDBusiness();

            #En caso de haber intentado una insercion verifica el resultado
            $resultInsert = array(
                            "<div id='close'>
                                <input type='button' onclick='miFuncion(1)' value='X'> ",
                                    "-----MESSAGE-----",
                                    "<br>__________________________________________________________
                                <br><br>
                            </div>");

            #Mensaje de respuesta. 
            if (isset($_GET['msg'])) {
                $resultInsert[1] = $_GET['msg'];
            }

            if ($resultInsert[1] != '-----MESSAGE-----') {
                echo $resultInsert[0].$resultInsert[1].$resultInsert[2]; 
             }
        ?>


        <a href="../../index.php"><h3>Inicio</h3></a>
        <h2>Cuentas &rarr;listado</h2>
        <?php
            $result = $accountBusiness->getAllAccountAssetsBusiness();
            foreach ($result as $tem) {
                echo    "Tipo cuenta: ". $tem->typeAccount.
                        " CSC: ".$tem->CSC.
                        " Fecha de expiración: ". $tem->expirationDate.
                        " Número de Tarjeta: ". $tem->cardNumber.
                    "<br><br>";
            }
        ?>


        <!--========================================================================================-->
        <h2>Cuentas &rarr;Insertar</h2> 

        <!-- Form -->
        <form method="POST" action="../../Business/Account/insertAccount.php">
            <input type="hidden" name="idAccount" value= <?php echo "'".$idAccount."'"?> readonly="readonly">
            
            <label>CSC</label>
            <input type="text" name="CSC" placeholder="CSC">
            
            <label>Tipo Cuenta</label>
            <input type="text" name="typeAccount" placeholder="Tipo de cuenta">
            
            <label>Numero de Tarjeta</label>
            <input type="text" name="cardNumber" placeholder="Numero de Cuenta">
           
            <br><br><label>Fecha de expiración</label>
            <input type="date" name="expirationDate" id="expirationDate" onkeypress="return valida(event)" value="<?php echo date('Y-m-d');?>">
            <input type="submit" value="Insertar" >   

        </form>
        <br>
     
        <!-- =========================================================================================== -->
            <h2>Cuentas &rarr;Actualizar/Deactivar</h2>
            
            <!-- Listado de cuentas para actualizarlas-->
                <?php
                    $result = $accountBusiness->getAllAccountAssetsBusiness();
                    foreach ($result as $tem) {
                        echo '<form method="POST" action="../../Business/Account/updateAccount.php?idAccount='.$tem->idAccount.'">';
                        ?>
                        <!-- Form --> 
                                                   
                            <input type="hidden" name="idAccount" value= <?php echo "'".$tem->idAccount."'"?>>    

                            <label> CSC </label>
                            <input type="text" name="CSC" value= <?php echo "'".$tem->CSC."'"?>>
                            
                            <label> Tipo Cuenta </label>
                            <input type="text" name="typeAccount" value= <?php echo "'".$tem->typeAccount."'"?>>
                            
                            <label> Numero de Cuenta </label>
                            <input type="text" name="cardNumber" value= <?php echo "'".$tem->cardNumber."'"?>>
                            
                            <br><br><label> Fecha de expiración </label>
                            <input type="date" name="expirationDate" value= <?php echo "'".$tem->expirationDate."'"?>>
                            
                            <input type="submit" value="Actualizar" >
                            <a href=<?php echo "../../Business/Account/DeactivateAccount.php?idAccount=".$tem->idAccount; ?> >Desactivar</a>
                               
                        </form>

                <?php  
                    echo "<br>";
                    }
                ?>

    </body>
</html>