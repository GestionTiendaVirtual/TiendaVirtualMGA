<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Actualizar Cuenta</title>

        <script type="text/javascript">
            function miFuncion()
            {
                var d = document.getElementById("close");
                while (d.hasChildNodes())
                d.removeChild(d.firstChild);
            }
        </script>
    </head>
    <body>
        <?php
        #En caso de haber intentado una insercion verifica el resultado
            $resultInsert = array(
                            "<div id='close'>
                                <b><input type='button' onclick='miFuncion()' value='X'> ",
                                    "-----MESSAGE-----",
                                    "</b><br>__________________________________________________________
                                <br><br>
                            </div>");

             #Si viene el idAccount quiere decir que se hizo la consulta en la BD
            if (isset($_GET['idAccount'])) {
                $resultInsert[1] = "<b>Se realizo la actualización de la cuenta: </b><br><br> 
                                    <b> &rArr; Id cuenta: </b>". $_GET['idAccount'].
                                    "<br> <b> &rArr; Id cliente: </b>". $_GET['idClient'].
                                    "<br> <b> &rArr; Banco: </b>". $_GET['bank'].
                                    "<br> <b> &rArr; Tipo cuenta: </b>". $_GET['typeAccount'];
                
            } #Fin de la accion en caso de lograr conexion con BD

            # ERRORES por validaciones de campos
            elseif (isset($_GET['error'])) {
                $resultInsert[1] = $_GET['error'];
            }
        ?>


        <!-- Menu -->
        <center>
            <br><b><a href="../index.php">Inicio</a></b>&nbsp;&nbsp;&nbsp;&nbsp;
            <b><a href="./ClientAccountRetrieve.php">Listado</a></b>&nbsp;&nbsp;&nbsp;&nbsp;
            <b><a href="./ClientAccountInsert.php">Insertar</a></b>&nbsp;&nbsp;&nbsp;&nbsp;
            <b><a href="#">Actualizar</a></b>&nbsp;&nbsp;&nbsp;&nbsp;
            <b><a href="./ClientAccountDelete.php">Eliminar</a></b>
            
            <hr>
            <!-- Fin menu -->

            <h1>Cuentas <small>&rarr;Actualizar</small></h1>
            

            <!-- Mensaje resultado del intento de actualizacion -->  
            <?php
                if ($resultInsert[1] != '-----MESSAGE-----') {
                    echo $resultInsert[0].$resultInsert[1].$resultInsert[2]; 
                 }
            ?> 

            <!-- Listado de cuentas para actualizarlas-->
                <?php
                    include '../Business/ClientAccountBusiness.php';
                    $clientAccountBusiness = new ClientAccountBusiness();
                    $result = $clientAccountBusiness->getAllClientAccountBusiness();
                    foreach ($result as $tem) {
                        echo '<form method="POST" action="../Business/updateAccount.php?idAccount='.$tem->idAccount.'">';
                        ?>
                        <!-- Form -->
                            <blockquote>
                                <label><b> &rArr; ID Cuenta </b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="text" name="idAccount" value= <?php echo "'".$tem->idAccount."'"?> readonly="readonly">
                                <br><br>

                                <label><b> &rArr; ID Cliente </b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="text" name="idClient" value= <?php echo "'".$tem->idClient."'"?>>
                                <br><br>

                                <label><b> &rArr; Banco </b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="text" name="bank" value= <?php echo "'".$tem->bank."'"?>>
                                <br><br>

                                <label><b> &rArr; Tipo Cuenta </b></label>&nbsp;
                                <input type="text" name="typeAccount" value= <?php echo "'".$tem->typeAccount."'"?>>
                                <br><br>

                                <input type="submit" value="Actualizar" >
                            </blockquote>
                        </form>

                        <?php  
                            echo "____________________________________________";
                    }
                        ?>
            </center>
    </body>
</html>