<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Obtener Cuenta</title>

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

            include '../Business/accountBusiness.php';
            $accountBusiness = new AccountBusiness();
            #Obtiene el id para la nueva cuenta
            $idAccount = $accountBusiness->getIDBusiness();

            #En caso de haber intentado una insercion verifica el resultado
            $resultInsert = array(
                            "<div id='close'>
                                <input type='button' onclick='miFuncion(1)' value='X'> ",
                                    "-----MESSAGE-----",
                                    "<br>__________________________________________________________
                                <br><br>
                            </div>");

            #Se realizo con exito.
            if (isset($_GET['msg'])) {
                $resultInsert[1] = $_GET['msg'];
            }

            if ($resultInsert[1] != '-----MESSAGE-----') {
                echo $resultInsert[0].$resultInsert[1].$resultInsert[2]; 
             }
        ?>



        <h2>Cuentas &rarr;listado</h2>
        <?php
            $result = $accountBusiness->getAllAccountBusiness();
            foreach ($result as $tem) {
                echo "
                        Id cuenta: ". $tem->idAccount.
                        " Id cliente: ".$tem->idClient.
                        " Tipo cuenta: ". $tem->typeAccount.
                        " CSC: ".$tem->CSC.
                        " Fecha de expiración: ". $tem->expirationDate.
                        " Número de Tarjeta: ". $tem->cardNumber.
                    "<br><br>";
            }
        ?>


        <!--========================================================================================-->
        <h2>Cuentas &rarr;Insertar</h2> 

        <!-- Form -->
        <form method="POST" action="../Business/insertAccount.php">
            <label>ID Cuenta</label>
            <input type="text" name="idAccount" value= <?php echo "'".$idAccount."'"?> readonly="readonly">

            <label>ID Cliente</label>
            <input type="text" name="idClient" placeholder="ID cliente">
            
            <label>CSC</label>
            <input type="text" name="CSC" placeholder="CSC">
            
            <label>Tipo Cuenta</label>
            <input type="text" name="typeAccount" placeholder="Tipo de cuenta">
            
            <label>Numero de Tarjeta</label>
            <input type="text" name="cardNumber" placeholder="Numero de Cuenta">
           
            <br><br><label>Fecha de expiración (aaaa-mm-dd)</label>
            <input type="text" name="expirationDate" placeholder="aaaa-mm-dd">
           <input type="submit" value="Insertar" >   

        </form>
        <br><br>

        <!--=============================================================================-->
        <h2>Cuentas &rarr;Eliminar</h2>
        

        <!-- Form -->
        <form method="GET" action="../Business/deleteAccount.php">
            <label> ID Cuenta </label>&nbsp;
            <input type="text" name="idAccount" placeholder="ID Cuenta">
            <input type="submit" value="Eliminar" ><br><br>
        </form>
        <!-- Fin del form -->
     
        <!-- =========================================================================================== -->
            <hr>
            <h1>Cuentas &rarr;Actualizar/Eliminar</h1>
            
            <!-- Listado de cuentas para actualizarlas-->
                <?php
                    $result = $accountBusiness->getAllAccountBusiness();
                    foreach ($result as $tem) {
                        echo '<form method="POST" action="../Business/updateAccount.php?idAccount='.$tem->idAccount.'">';
                        ?>
                        <!-- Form -->
                            <label> ID Cuenta </label>
                            <input type="text" name="idAccount" value= <?php echo "'".$tem->idAccount."'"?> readonly="readonly">
                            
                            <label> ID Cliente </label>
                            <input type="text" name="idClient" value= <?php echo "'".$tem->idClient."'"?>>                            
                            
                            <label> CSC </label>
                            <input type="text" name="CSC" value= <?php echo "'".$tem->CSC."'"?>>
                            
                            <label> Tipo Cuenta </label>
                            <input type="text" name="typeAccount" value= <?php echo "'".$tem->typeAccount."'"?>>
                            
                            <label> Numero de Cuenta </label>
                            <input type="text" name="cardNumber" value= <?php echo "'".$tem->cardNumber."'"?>>
                            
                            <br><br><label> Fecha de expiración </label>
                            <input type="text" name="expirationDate" value= <?php echo "'".$tem->expirationDate."'"?>>
                            
                            <input type="submit" value="Actualizar" >
                            <a href=<?php echo "../Business/deleteAccount.php?idAccount=".$tem->idAccount; ?> >Eliminar</a>
                               
                        </form>

                        <?php  
                            echo "<br><br><br><br>";
                    }
                        ?>
            </center>


    </body>
</html>