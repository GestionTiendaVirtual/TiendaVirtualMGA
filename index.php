<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Inicio</h1>
        <br>
        <hr>
        <a href="./Presentation/Account/AccountInterface.php">CRUD cuenta</a>
        <a href="./Presentation/ProductCreate.php">CRUD Producto</a>
        <a href="./Presentation/combo.php">Dirección cliente</a>
        <a href="./Presentation/Product/typeProductInterface.php">Tipo</a>
        <?php
        if (@session_start() == true) {
            if (isset($_SESSION["idUser"])) {
                ?>
                <a href="Business/loginAction.php?logout">Cerrar</a>
                <hr>                <!--Form para busquedas-->

                <input type="text" id="termSearch" placeholder="termino de busqueda">
                <button onclick="ajax();" >buscar</button>
                <!-- Fin del form para busqueda -->
                <?php
            } else {
                ?>
                <hr><br>
                <form id="frmLogin" method="POST" action="./Business/loginAction.php">
                    <label id="lblUser">Usuario:&emsp;</label>
                    <input type="text" id="txtUser" name="txtUser"/><br><br>
                    <label id="lblUser">Contraseña:</label>
                    <input type="password" id="txtPassword" name="txtPassword"/><br><br>
                    <input type="submit" id="btnAccept" name="btnAccept" value="Iniciar sesión"/><br>
                    <input type="hidden" id="option" name="option" value="login">
                    <label id="txtMessage"></label>
                </form>
                <br><br>
                <?php
            }
        }
        ?>
        <?php
        if (isset($_GET['errorData'])) {
            echo ' <script>                
               document.getElementById("txtMessage").innerHTML = "Error el usuario no existe";
           </script>';
        }
        ?>



        <script type="text/javascript">
            function ajax() {
                // De esta forma se obtiene la instancia del objeto XMLHttpRequest
                if (window.XMLHttpRequest) {
                    connection = new XMLHttpRequest();
                }
                else if (window.ActiveXObject) {
                    connection = new ActiveXObject("Microsoft.XMLHTTP");
                }

                var param = document.getElementById("termSearch").value;

                // Preparando la función de respuesta
                connection.onreadystatechange = response;

                // Realizando la petición HTTP con método POST
                connection.open('POST', './Business/Search/SearchProduct.php');
                connection.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                connection.send("termSearch=" + param);
            }

            function response() {
                if (connection.readyState == 4) {
                    alert(connection.responseText);
                }
            }
        </script>

    </body>
</html>
