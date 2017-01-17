<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Eliminar Dispositivo Movil</title>
    </head>
    <body>
        <!-- Menu -->
        <b><a href="../index.php">Inicio</a></b>&nbsp;&nbsp;&nbsp;&nbsp;
        <b><a href="./CelphoneRetrieve.php">Listado Movil</a></b>&nbsp;&nbsp;&nbsp;&nbsp;
        <b><a href="./CelphoneInsert.php">Insertar Movil</a></b>&nbsp;&nbsp;&nbsp;&nbsp;
        <b><a href="#">Eliminar Movil</a></b>
        <hr>
        <!-- Fin menu -->

        <h1>Moviles <small>&rarr;Eliminar</small></h1>
        <!-- Solicitud de datos a insertar -->
        
        
       <!-- Form -->
        <form method="POST" action="../Business/deleteCelphone.php">
            <table border="1px">
                <td>
                    <blockquote>
                        <label> &rArr; ID Movil </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" name="idCelphone" placeholder="ID Movil">
                        <br><br>

                        <input type="submit" value="Eliminar" >
                    </blockquote>
                </td>
            </table>
        </form>
        <!-- Fin del form -->

        <!-- Listado de Movils para eliminarlas-->
            <?php
                include '../Business/CelphoneBusiness.php';
                $CelphoneBusiness = new CelphoneBusiness();
                $result = $CelphoneBusiness->getAllCelphoneBusiness();
                foreach ($result as $tem) {
                    echo '<form method="POST" action="../Business/deleteCelphone.php?idCelphone='.$tem->idCelphone.'">';
                    echo "
                            <blockquote>
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
                       echo "</form>";
                }

            ?>
        </form>
        <!-- Fin del listado de Movils para eliminarlas -->

    </body>
</html>