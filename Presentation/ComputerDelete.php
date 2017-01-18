<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Eliminar Dispositivo Computadora</title>
    </head>
    <body>
        <!-- Menu -->
        <b><a href="../index.php">Inicio</a></b>&nbsp;&nbsp;&nbsp;&nbsp;
        <b><a href="./ComputerRetrieve.php">Listado Computadoras</a></b>&nbsp;&nbsp;&nbsp;&nbsp;
        <b><a href="./ComputerInsert.php">Insertar Computadora</a></b>&nbsp;&nbsp;&nbsp;&nbsp;
        <b><a href="#">Eliminar Computadora</a></b>
        <hr>
        <!-- Fin menu -->

        <h1>Computadoras <small>&rarr;Eliminar</small></h1>
        <!-- Solicitud de datos a insertar -->
        
        
       <!-- Form -->
        <form method="POST" action="../Business/deleteComputer.php">
            <table border="1px">
                <td>
                    <blockquote>
                        <label> &rArr; ID Computadora </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" name="idComputer" placeholder="ID Computadora">
                        <br><br>

                        <input type="submit" value="Eliminar" >
                    </blockquote>
                </td>
            </table>
        </form>
        <!-- Fin del form -->

        <!-- Listado de Computadoras para eliminarlas-->
            <?php
                include '../Business/ComputerBusiness.php';
                $ComputerBusiness = new ComputerBusiness();
                $result = $ComputerBusiness->getAllComputerBusiness();
                foreach ($result as $tem) {
                    echo '<form method="POST" action="../Business/deleteComputer.php?idComputer='.$tem->idComputer.'">';
                    echo "
                            <blockquote>
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
                       echo "</form>";
                }

            ?>
        </form>
        <!-- Fin del listado de Computadoras para eliminarlas -->

    </body>
</html>