<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Obtener Computadora</title>
    </head>
    <body>
        <!-- Menu -->
        <b><a href="../index.php">Inicio</a></b>&nbsp;&nbsp;&nbsp;&nbsp;
        <b><a href="#">Listado Computadora</a></b>&nbsp;&nbsp;&nbsp;&nbsp;
        <b><a href="./ComputerInsert.php">Insertar Computadora</a></b>&nbsp;&nbsp;&nbsp;&nbsp;
        <b><a href="./ComputerDelete.php">Eliminar Computadora</a></b>
        <hr>
        <!-- Fin menu -->

        <h1>Computadoraes <small>&rarr;listado</small></h1>
        <?php
            include '../Business/ComputerBusiness.php';
            $ComputerBusiness = new ComputerBusiness();
            $result = $ComputerBusiness->getAllComputerBusiness();
            foreach ($result as $tem) {
                echo " <blockquote>
                                <b> &rArr; Id PC: </b>". $tem->idComputer.
                                "<br> <b> &rArr; Distintivo: </b>".$tem->nameComputer.
                                "<br> <b> &rArr; RAM: </b>". $tem->ramMemory.
                                "<br> <b> &rArr; Software: </b>". $tem->operativeSystem.
                                "<br> <b> &rArr; Almacenamiento: </b>". $tem->hardDisk.
                                "<br> <b> &rArr; Graficos: </b>".$tem->sizeDisplay.
                                "<br> <b> &rArr; Video: </b>". $tem->videoTarjet.
                                "<br> <b> &rArr; Wi-Fi: </b>". $tem->wifi.
                                "<br> <b> &rArr; Bateria: </b>". $tem->battery.
                                "<br> <b> &rArr; Detalles: </b>". $tem->other.
                                "<br><br> <input type='submit' value='Eliminar'>
                            </blockquote>
                    ____________________________________________";
            }
        ?>
    </body>
</html>