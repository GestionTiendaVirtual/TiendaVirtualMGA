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
                                    "</b><br>__________________________________________________________<br>
                                <br><br>
                            </div>");

             #Si viene el idAccount quiere decir que se hizo la consulta en la BD
            if (isset($_GET['result'])) {
                $resultInsert[1] = "<b>Se realizó la actualización de la cuenta:";
                
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
                    include '../Business/AccountBusiness.php';
                    $AccountBusiness = new AccountBusiness();
                    $result = $AccountBusiness->getAllAccountBusiness();
                    foreach ($result as $tem) {
                        echo '<form method="POST" action="../Business/updateAccount.php?idAccount='.$tem->idAccount.'">';
                        ?>
                        <!-- Form -->
                        <table>

                            <tr>
                                <td><label><b> &rArr; ID Cuenta </b></label></td>
                                <td><input type="text" name="idAccount" value= <?php echo "'".$tem->idAccount."'"?> readonly="readonly"></td>
                            </tr>
                            <tr>
                                <td><label><b> &rArr; ID Cliente </b></label></td>
                                <td><input type="text" name="idClient" value= <?php echo "'".$tem->idClient."'"?>></td>
                            </tr>
                            <tr>
                                <td><label><b> &rArr; CSC </b></label></td>
                                <td><input type="text" name="CSC" value= <?php echo "'".$tem->CSC."'"?>></td>
                            </tr>
                            <tr>
                                <td><label><b> &rArr; Tipo Cuenta </b></label></td>
                                <td><input type="text" name="typeAccount" value= <?php echo "'".$tem->typeAccount."'"?>></td>
                            </tr>
                            <tr>
                                <td><label><b> &rArr; Numero de Cuenta </b></label></td>
                                <td><input type="text" name="cardNumber" value= <?php echo "'".$tem->cardNumber."'"?>></td>
                            </tr>
                            <tr>
                                <td><label><b> &rArr; Fecha de expiración  </b></label></td>
                                <td><input type="text" name="expirationDate" value= <?php echo "'".$tem->expirationDate."'"?>></td>
                            </tr>
                            <tr>
                                <td><input type="submit" value="Actualizar" ></td>
                            </tr>
                        </table>
                               
                        </form>

                        <?php  
                            echo "<br><br><br><br>";
                    }
                        ?>
            </center>
    </body>
</html>