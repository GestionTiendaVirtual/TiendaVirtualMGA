<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Insertar Cuenta</title>

        <script type="text/javascript">
            function miFuncion()
            {
                var d = document.getElementById("close");
                while (d.hasChildNodes())
                d.removeChild(d.firstChild);
            }
        </script>
    </head>
    <body>
        <?php
            include '../Business/AccountBusiness.php';
            $accountBusiness = new AccountBusiness();

            #Obtiene el id para la nueva cuenta
            $idAccount = $accountBusiness->getIDBusiness();

            #En caso de haber intentado una insercion verifica el resultado
            $resultInsert = array(
                            "<div id='close'>
                                <b><input type='button' onclick='miFuncion()' value='X'> ",
                                    "-----MESSAGE-----",
                                    "</b><br>__________________________________________________________
                                <br><br>
                            </div>");

            #Si viene el idAccount quiere decir que se hizo la consulta el la BD
            if (isset($_GET['idAccount'])) {
                $result = $accountBusiness->getAccountByIdBusiness($_GET['idAccount']);
                
                #Si no se optiene quiere decir que existio algun problema
                if ((count($result)) <= 0) {
                    $resultInsert[1] = " No se logro realizar la insercion de la cuenta con el ID: ". $_GET['idAccount'];
                }
                #Se intenta optener la cuenta de la BD, si se iptiene, se realizo con exito.
                else{
                    $tem = $result[0];
                    $resultInsert[1] = "<b>Se realizo la insercion de la cuenta: </b><br><br> 
                                         <b> &rArr; Id cuenta: </b>". $tem->idAccount.
                                        "<br> <b> &rArr; Id cliente: </b>".$tem->idClient.
                                        "<br> <b> &rArr; Tipo cuenta: </b>". $tem->typeAccount.
                                        "<br> <b> &rArr; CSC: </b>".$tem->CSC.
                                        "<br> <b> &rArr; Fecha de expiración: </b>". $tem->expirationDate.
                                        "<br> <b> &rArr; Número de Tarjeta: </b>". $tem->cardNumber;
                }
            } #Fin de la accion en caso de lograr conexion con BD
            # ERRORES por validaciones de campos
            elseif (isset($_GET['error'])) {
                $resultInsert[1] = $_GET['error'];
            }
        ?>

        <!-- Manu -->
        <center><br><b><a href="../index.php">Inicio</a></b>&nbsp;&nbsp;&nbsp;&nbsp;
        <b><a href="./ClientAccountRetrieve.php">Listado</a></b>&nbsp;&nbsp;&nbsp;&nbsp;
        <b><a href="#">Insertar</a></b>&nbsp;&nbsp;&nbsp;&nbsp;
        <b><a href="./ClientAccountUpdate.php">Actualizar</a></b>&nbsp;&nbsp;&nbsp;&nbsp;
        <b><a href="./ClientAccountDelete.php">Eliminar</a></b>
        <hr>
        <!-- Fin menu -->

        <h1>Cuentas <small>&rarr;Insertar</small></h1>
        <!-- Solicitud de datos a insertar -->
        
        <!-- Mensaje resultado del intento de insersion -->  
        <?php
            if ($resultInsert[1] != '-----MESSAGE-----') {
                echo $resultInsert[0].$resultInsert[1].$resultInsert[2]; 
             }
        ?> 

        <!-- Form -->
        <form method="POST" action="../Business/insertAccount.php">
            <table>
                <tr>
                    <td><label><b> &rArr; ID Cuenta </b></label></td>
                    <td><input type="text" name="idAccount" value= <?php echo "'".$idAccount."'"?> readonly="readonly"></td>
                </tr>

                <tr>
                    <td><label><b> &rArr; ID Cliente </b></label></td>
                    <td><input type="text" name="idClient" placeholder="ID cliente"></td>
                </tr>
                
                <tr>
                    <td><label><b> &rArr; CSC </b></label></td>
                    <td><input type="text" name="CSC" placeholder="CSC"></td>
                </tr>

                <tr>
                    <td><label><b> &rArr; Tipo Cuenta </b></label></td>
                    <td><input type="text" name="typeAccount" placeholder="Tipo de cuenta"></td>
                </tr>

                <tr>
                    <td><label><b> &rArr; Numero de Tarjeta </b></label></td>
                    <td><input type="text" name="cardNumber" placeholder="Numero de Cuenta"></td>
                </tr>

                <tr>
                    <td><label><b> &rArr; Fecha de expiración (aaaa-mm-dd) </b></label></td>
                    <td><input type="text" name="expirationDate" placeholder="aaaa-mm-dd"></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Insertar" ></td>
                </tr>
                
            </table>

        </form>
        </center>
    </body>
</html>