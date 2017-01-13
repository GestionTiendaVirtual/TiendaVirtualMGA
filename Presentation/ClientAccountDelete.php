<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Eliminar Cuenta</title>
    </head>
    <body>
        <!-- Menu -->
        <b><a href="../index.php">Inicio</a></b>&nbsp;&nbsp;&nbsp;&nbsp;
        <b><a href="./ClientAccountRetrieve.php">Listado Cuenta</a></b>&nbsp;&nbsp;&nbsp;&nbsp;
        <b><a href="./ClientAccountInsert.php">Insertar Cuenta</a></b>&nbsp;&nbsp;&nbsp;&nbsp;
        <b><a href="#">Eliminar Cuenta</a></b>
        <hr>
        <!-- Fin menu -->

        <h1>Cuentas <small>&rarr;Eliminar</small></h1>
        

        <!-- Form -->
        <form method="POST" action="../Business/deleteAccount.php">
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