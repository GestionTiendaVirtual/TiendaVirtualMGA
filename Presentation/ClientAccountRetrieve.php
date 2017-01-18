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
            include '../Business/accountBusiness.php';
            $accountBusiness = new AccountBusiness();
            $result = $accountBusiness->getAllAccountBusiness();
            foreach ($result as $tem) {
                echo "<blockquote>
                        <b> &rArr; Id cuenta: </b>". $tem->idAccount.
                        "<br> <b> &rArr; Id cliente: </b>".$tem->idClient.
                        "<br> <b> &rArr; Tipo cuenta: </b>". $tem->typeAccount.
                        "<br> <b> &rArr; CSC: </b>".$tem->CSC.
                        "<br> <b> &rArr; Fecha de expiración: </b>". $tem->expirationDate.
                        "<br> <b> &rArr; Número de Tarjeta: </b>". $tem->cardNumber.
                    "</blockquote>
                    ____________________________________________";
            }
        ?>
        </center>
    </body>
</html>