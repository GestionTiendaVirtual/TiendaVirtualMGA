<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Obtener Cuenta</title>
    </head>
    <body>
        <!-- Menu -->
        <center><br>
        <b><a href="../index.php">Inicio</a></b>&nbsp;&nbsp;&nbsp;&nbsp;
        <b><a href="#">Listado</a></b>&nbsp;&nbsp;&nbsp;&nbsp;
        <b><a href="./ClientAccountInsert.php">Insertar</a></b>&nbsp;&nbsp;&nbsp;&nbsp;
        <b><a href="./ClientAccountUpdate.php">Actualizar</a></b>&nbsp;&nbsp;&nbsp;&nbsp;
        <b><a href="./ClientAccountDelete.php">Eliminar</a></b>
        <hr>
        <!-- Fin menu -->

        <h1>Cuentas <small>&rarr;listado</small></h1>
        <?php
            include '../Business/ClientAccountBusiness.php';
            $clientAccountBusiness = new ClientAccountBusiness();
            $result = $clientAccountBusiness->getAllClientAccountBusiness();
            foreach ($result as $tem) {
                echo "<blockquote>
                        <b> &rArr; Id cuenta: </b>". $tem->idAccount.
                        "<br> <b> &rArr; Id cliente: </b>".$tem->idClient.
                        "<br> <b> &rArr; Banco: </b>". $tem->bank.
                        "<br> <b> &rArr; Tipo cuenta: </b>". $tem->typeAccount.
                    "</blockquote>
                    ____________________________________________";
            }
        ?>
        </center>
    </body>
</html>