<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Obtener Cuenta</title>
    </head>
    <body>
        <!-- Menu -->
        <b><a href="../index.php">Inicio</a></b>&nbsp;&nbsp;&nbsp;&nbsp;
        <b><a href="#">Listado Cuenta</a></b>&nbsp;&nbsp;&nbsp;&nbsp;
        <b><a href="./ClientAccountInsert.php">Insertar Cuenta</a></b>&nbsp;&nbsp;&nbsp;&nbsp;
        <b><a href="./ClientAccountUpdate.php">Actualizar Cuenta</a></b>&nbsp;&nbsp;&nbsp;&nbsp;
        <b><a href="./ClientAccountDelete.php">Eliminar Cuenta</a></b>
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
    </body>
</html>