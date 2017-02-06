<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Obtener Cuenta</title>

        <!-- Script para eliminar el mensaje. -->
        <script type="text/javascript">
            function miFuncion()
            {
                var d = document.getElementById("close");
                while (d.hasChildNodes())
                d.removeChild(d.firstChild);
            }
        </script>

          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
          <link rel="stylesheet" href="/resources/demos/style.css">
          <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
          <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
          <script>
          $( function() {
            $( ".datepicker" ).datepicker();
          } );
        </script>

        <!-- Script para validar -->
        <script type="text/javascript">
            /*VAlidacion general*/
            function validacion(cardNumberId, cscId, expirationDateId) {
                /*Se obtienen los datos de los input*/
                cardNumber = document.getElementById(cardNumberId).value;
                csc = document.getElementById(cscId).value;
                expirationDate = document.getElementById(expirationDateId).value;


                /*Se validan los datos recibidos*/
                if(cardNumber == null ||
                    cardNumber.length == 0 || 
                    !(/^((67\d{2})|(4\d{3})|(5[1-5]\d{2})|(6011))(-?\s?\d{4}){3}|(3[4,7])\ d{2}-?\s?\d{6}-?\s?\d{5}$/.test(cardNumber))){
                    /*Si se cumplen tofas las condiciones retorna false*/

                    document.getElementById("msgError").innerHTML = "<br> <hr> ERROR con el numero de cuenta <hr>";
                    return false;
                }
                else if(csc==null||csc.length==0||expirationDate==null||expirationDate.length==0){
                    document.getElementById("msgError").innerHTML = "<br> <hr> ERROR de campos vacios <hr>";

                    return false;
                }else if(!isDate(expirationDate)){
                    document.getElementById("msgError").innerHTML = "<br> <hr> ERROR. Fecha no aceptada. <hr>";
                    return false;
                }           
              return true;
            }/*FIN Validacion general*/

            /*Validacion de insercion*/
            function validaInsert(){
                return validacion("cardNumber", "CSC", "expirationDate");
            }

            /*Validacion de insercion*/
            function validaUpdate(numID){
                return validacion("cardNumber"+numID, "CSC"+numID, "expirationDate"+numID);
            }

            /* Solo permite numeros */
            function validaNum(e) { // 1
                tecla = (document.all) ? e.keyCode : e.which; // 2
                if (tecla==8) return true; // 3
                patron =/\d/; // 4
                te = String.fromCharCode(tecla); // 5
                return patron.test(te); // 6
            }
        </script>

    </head>
    <body>
        <?php
            include_once '../../Business/Account/AccountBusiness.php';
            $accountBusiness = new AccountBusiness();
            
            /*Obtiene todos los tipos de cuenta*/
            include_once '../../Business/TypeAccount/TypeAccountBusiness.php';
            $instTypeAccount = new TypeAccountBusiness();
            $listTypeAccount = $instTypeAccount->getTypeAccountBusiness();

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

            #Mensaje de respuesta. 
            if (isset($_GET['msg'])) {
                $resultInsert[1] = $_GET['msg'];
            }

            if ($resultInsert[1] != '-----MESSAGE-----') {
                echo $resultInsert[0].$resultInsert[1].$resultInsert[2]; 
             }
        ?>

        <a href="../../Presentation/Modules/ClientView.php"><b>Atrás</b></a>
        <!-- Estructura para mostrar mensajes de validaciones del lado del cliente -->
        <center><h3 id="msgError"></h3></center>

        <!--========================================================================================-->
        <h2>Cuentas &rarr;Insertar</h2> 

        <!-- Form -->
        <form method="POST" action="../../Business/Account/insertAccount.php" autocomplete="off" onsubmit="return validaInsert()"> 
            <input type="hidden" name="idAccount" value= <?php echo "'".$idAccount."'"?> readonly="readonly">
            
            <label>CSC</label>
            <input type="text" name="CSC" id="CSC" placeholder="CSC" onkeypress="return validaNum(event)" maxlength="3">
            
            <label>Tipo Cuenta</label>
            <select name="typeAccount">
                <?php
                    foreach ($listTypeAccount as $tem2) {
                ?>
                    <option value="<?php echo $tem2->idTypeAccount ?>"> <?php echo $tem2->nameTypeAccount ?> </option>
                <?php    
                }

                ?>
            </select>

            <label>Numero de Tarjeta</label>
            <input type="text" name="cardNumber" id="cardNumber" placeholder="Numero de Cuenta" onkeypress="return validaNum(event)">
           
            <br><br><label>Fecha de expiración</label>
            <input type="text" name="expirationDate" id="expirationDate" class="datepicker">
            <input type="submit" value="Insertar" >   

        </form>
        <br>
     
        <!-- =========================================================================================== -->
            <h2>Cuentas &rarr;Actualizar/Deactivar</h2>
            
            <!-- Listado de cuentas para actualizarlas-->
                <?php
                    $result = $accountBusiness->getAllAccountAssetsBusiness();
                    $cont = 0;
                    foreach ($result as $tem) {
                        $cont++;
                        ?>
                        <form method="POST" action="../../Business/Account/updateAccount.php?idAccount=<?php echo $tem->idAccount; ?>" autocomplete="off" onsubmit="return validaUpdate(<?php echo $cont; ?>)">
                        <!-- Form --> 
                                                   
                            <input type="hidden" name="idAccount" value= <?php echo "'".$tem->idAccount."'"?>>    

                            <label> CSC </label>
                            <input type="text" name="CSC" id="CSC<?php echo $cont; ?>" value= <?php echo "'".$tem->CSC."'"?> onkeypress="return validaNum(event)" maxlength="3">
                            
                            <label> Tipo Cuenta </label>                            
                            <select name="typeAccount">
                                <?php
                                    foreach ($listTypeAccount as $tem2) {
                                ?>
                                    <option 
                                        value="<?php echo $tem2->idTypeAccount ?>"
                                        <?php
                                            if ($tem2->idTypeAccount == $tem->typeAccount) {
                                                echo "selected";
                                            }
                                        ?>
                                    > <!-- Cierre del <option> -->
                                        <?php echo $tem2->nameTypeAccount ?> 
                                    </option> <!-- Fin de una opcion -->
                                <?php    
                                }

                                ?>
                            </select>


                            <label> Numero de Cuenta </label>
                            <input type="text" name="cardNumber" id="cardNumber<?php echo $cont; ?>" value= <?php echo "'".$tem->cardNumber."'"?> onkeypress="return validaNum(event)">
                            
                            <br><br><label> Fecha de expiración </label>
                            <input type="text" name="expirationDate" id="expirationDate<?php echo $cont; ?>" class="datepicker" value= <?php echo "'".$tem->expirationDate."'"?>>

                            <input type="submit" value="Actualizar" >
                            <a href=<?php echo "../../Business/Account/DeactivateAccount.php?idAccount=".$tem->idAccount; ?> >Desactivar</a>
                               
                        </form>

                <?php  
                    echo "<br>";
                    }
                ?>

    </body>
</html>