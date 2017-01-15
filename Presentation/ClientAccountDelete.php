<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Eliminar Cuenta</title>


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
                            "<div id='close'><blockquote>
                                <table border='1px'>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <form>
                                                <input type='button' onclick='miFuncion()' value='X'>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <blockquote><b>",
                                        "-----MESSAGE-----",
                                            "</b><blockquote>
                                        </td>
                                    </tr>
                                </table>
                            </blockquote></div>");


            #Si viene el idAccount quiere decir que se hizo la consulta en la BD
            if (isset($_GET['idAccount'])) {
                $resultInsert[1] = "Se realizo la eliminacion de la cuenta " . $_GET['idAccount']."";
            } #Fin de la accion en caso de lograr conexion con BD

            # ERRORES por validaciones de campos
            elseif (isset($_GET['error'])) {
                $resultInsert[1] = $_GET['error'];
            }
        ?>



        <!-- Menu -->
        <b><a href="../index.php">Inicio</a></b>&nbsp;&nbsp;&nbsp;&nbsp;
        <b><a href="./ClientAccountRetrieve.php">Listado Cuenta</a></b>&nbsp;&nbsp;&nbsp;&nbsp;
        <b><a href="./ClientAccountInsert.php">Insertar Cuenta</a></b>&nbsp;&nbsp;&nbsp;&nbsp;
        <b><a href="./ClientAccountUpdate.php">Actualizar Cuenta</a></b>&nbsp;&nbsp;&nbsp;&nbsp;
        <b><a href="#">Eliminar Cuenta</a></b>
        <hr>
        <!-- Fin menu -->

        <h1>Cuentas <small>&rarr;Eliminar</small></h1>
        

        <!-- Mensaje resultado del intento de eliminacion -->  
        <?php
            if ($resultInsert[1] != '-----MESSAGE-----') {
                echo $resultInsert[0].$resultInsert[1].$resultInsert[2]; 
             }
        ?> 

        <!-- Form -->
        <form method="GET" action="../Business/deleteAccount.php">
            <table border="1px">
                <td>
                    <blockquote>
                        <label> &rArr; ID Cuenta </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" name="idAccount" placeholder="ID Cuenta">
                        <br><br>

                        <input type="submit" value="Eliminar" >
                    </blockquote>
                </td>
            </table>
        </form>
        <!-- Fin del form -->

        <!-- Listado de cuentas para eliminarlas-->
            <?php
                include '../Business/ClientAccountBusiness.php';
                $clientAccountBusiness = new ClientAccountBusiness();
                $result = $clientAccountBusiness->getAllClientAccountBusiness();
                foreach ($result as $tem) {
                    echo '<form method="POST" action="../Business/deleteAccount.php?idAccount='.$tem->idAccount.'">';
                    echo "
                            <blockquote>
                                <b> &rArr; Id cuenta: </b>". $tem->idAccount.
                                "<br> <b> &rArr; Id cliente: </b>".$tem->idClient.
                                "<br> <b> &rArr; Banco: </b>". $tem->bank.
                                "<br> <b> &rArr; Tipo cuenta: </b>". $tem->typeAccount.
                                "<br><br> <input type='submit' value='Eliminar'>
                            </blockquote>
                        
                        ____________________________________________";
                       echo "</form>";
                }
            ?>
        </form>
        <!-- Fin del listado de cuentas para eliminarlas -->
    </body>
</html>