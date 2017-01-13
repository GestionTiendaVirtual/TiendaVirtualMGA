<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Insertar Cuenta</title>
    </head>
    <body>
        <!-- Manu -->
        <b><a href="../index.php">Inicio</a></b>&nbsp;&nbsp;&nbsp;&nbsp;
        <b><a href="./ClientAccountRetrieve.php">Listado Cuenta</a></b>&nbsp;&nbsp;&nbsp;&nbsp;
        <b><a href="#">Insertar Cuenta</a></b>&nbsp;&nbsp;&nbsp;&nbsp;
        <b><a href="./ClientAccountDelete.php">Eliminar Cuenta</a></b>
        <hr>
        <!-- Fin menu -->

        <h1>Cuentas <small>&rarr;Insertar</small></h1>
        <!-- Solicitud de datos a insertar -->
        
        <!-- Form -->
        <form method="POST" action="../Business/insertAccount.php">
            <blockquote>
                <label> &rArr; ID Cliente </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="idClient" placeholder="ID Cliente">
                <br><br>

                <label> &rArr; ID Cuenta </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="idAccount" placeholder="ID Cuenta">
                <br><br>

                <label> &rArr; Banco </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="bank" placeholder="Banco">
                <br><br>

                <label> &rArr; Tipo Cuenta </label>&nbsp;
                <input type="text" name="typeAccount" placeholder="Tipo de cuenta">
                <br><br>

                <input type="submit" value="Insertar" >
            </blockquote>
        </form>
    </body>
</html>