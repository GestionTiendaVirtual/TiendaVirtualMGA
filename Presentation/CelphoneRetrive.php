<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Obtener Movil</title>
    </head>
    <body>
        <!-- Menu -->
        <b><a href="../index.php">Inicio</a></b>&nbsp;&nbsp;&nbsp;&nbsp;
        <b><a href="#">Listado Movil</a></b>&nbsp;&nbsp;&nbsp;&nbsp;
        <b><a href="./CelphoneInsert.php">Insertar Movil</a></b>&nbsp;&nbsp;&nbsp;&nbsp;
        <b><a href="./CelphoneDelete.php">Eliminar Movil</a></b>
        <hr>
        <!-- Fin menu -->

        <h1>Moviles <small>&rarr;listado</small></h1>
        <?php
            include '../Business/CelphoneBusiness.php';
            $celphoneBusiness = new CelphoneBusiness();
            $result = $celphoneBusiness->getAllCelphoneBusiness();
            foreach ($result as $tem) {
                echo " <blockquote>
                                <b> &rArr; Id Movil: </b>". $tem->idCelphone.
                                "<br> <b> &rArr; Distintivo: </b>".$tem->nameCelphone.
                                "<br> <b> &rArr; Ret: </b>". $tem->net.
                                "<br> <b> &rArr; Año: </b>". $tem->yearCreate.
                                "<br> <b> &rArr; Pantalla: </b>". $tem->typeDisplay.
                                "<br> <b> &rArr; Graficos: </b>".$tem->sizeDisplay.
                                "<br> <b> &rArr; Memoria: </b>". $tem->sdMemory.
                                "<br> <b> &rArr; Software: </b>". $tem->operativeSystem.
                                "<br> <b> &rArr; Camara: </b>". $tem->camera.
                                "<br> <b> &rArr; Detalles: </b>". $tem->other.
                                "<br><br> <input type='submit' value='Eliminar'>
                            </blockquote>
                    ____________________________________________";
            }
        ?>
    </body>
</html>