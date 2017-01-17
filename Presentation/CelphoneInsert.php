<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Insertar Dispositivo Movil</title>
    </head>
    <body>
        <!-- Menu -->
        <b><a href="../index.php">Inicio</a></b>&nbsp;&nbsp;&nbsp;&nbsp;
        <b><a href="./CelphoneRetrieve.php">Listado de Moviles</a></b>&nbsp;&nbsp;&nbsp;&nbsp;
        <b><a href="#">Insertar Moviles</a></b>&nbsp;&nbsp;&nbsp;&nbsp;
        <b><a href="./CelphoneDelete.php">Eliminar Movil</a></b>
        <hr>
        <!-- Fin menu -->

        <h1>Moviles <small>&rarr;Insertar</small></h1>
        <!-- Solicitud de datos a insertar -->
        
        <!-- Form -->
        <form method="POST" action="../Business/CelphoneBusiness.php">
            <blockquote>
                <label> &rArr; ID Movil </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="idCelphone" placeholder="ID Celphone">
                <br><br>

                <label> &rArr; Distintivo </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="nameCelphone" placeholder="Nombre">
                <br><br>

                <label> &rArr; Conexión </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="net" placeholder="Red">
                <br><br>

                <label> &rArr; Lanzado al Mercado </label>&nbsp;
                <input type="text" name="yearCreate" placeholder="Año de Lanzamiento">
                <br><br>

                <label> &rArr; Tipo de Pantalla </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="typeDisplay" placeholder="Version de Pantalla">
                <br><br>

                <label> &rArr; Graficos </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="sizeDisplay" placeholder="Dimension de Graficos">
                <br><br>

                <label> &rArr; Memoria Externa </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="sdMemory" placeholder="Capacidad Expandible">
                <br><br>


                <label> &rArr; Sistema Operativo </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;
                <input type="text" name="operativeSystem" placeholder="Version del Sistema">
                <br><br>

                 <label> &rArr; Camara </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="sdMemory" placeholder="Capacidad Expandible">
                <br><br>

                <label> &rArr; Detalles </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;
                <input type="text" name="other" placeholder="Otros Detalles">
                <br><br>

                <input type="submit" value="Insertar" >
            </blockquote>
        </form>
    </body>
</html>

        
        