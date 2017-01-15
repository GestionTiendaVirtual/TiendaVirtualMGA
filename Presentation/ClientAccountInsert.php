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
            include '../Business/ClientAccountBusiness.php';
            $clientAccountBusiness = new ClientAccountBusiness();

            #Obtiene el id para la nueva cuenta
            $idAccount = $clientAccountBusiness->getIDBusiness();

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
                $result = $clientAccountBusiness->getClientAccountByIdBusiness($_GET['idAccount']);
                
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
                                        "<br> <b> &rArr; Banco: </b>". $tem->bank.
                                        "<br> <b> &rArr; Tipo cuenta: </b>". $tem->typeAccount;
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
            <blockquote>
                <label><b> &rArr; ID Cuenta </b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="idAccount" value= <?php echo "'".$idAccount."'"?> readonly="readonly">
                <br><br>

                <label><b> &rArr; ID Cliente </b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="idClient" placeholder="ID cliente">
                <br><br>

                <label><b> &rArr; Banco </b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="bank" placeholder="Banco">
                <br><br>

                <label><b> &rArr; Tipo Cuenta </b></label>&nbsp;
                <input type="text" name="typeAccount" placeholder="Tipo de cuenta">
                <br><br>

                <input type="submit" value="Insertar" >
            </blockquote>
        </form>
        </center>
    </body>
</html>