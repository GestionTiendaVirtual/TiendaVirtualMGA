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
        <a href="./Presentation/DirectionClient.php">Direcciones</a>
        <a href="./Presentation/TypeProduct/typeProductInterface.php">Tipo producto</a>
        <a href="./Presentation/Product/ProductCreate.php">CRUD Producto</a>
        <a href="./Presentation/Client/clientInterface.php">Cliente</a>
        <a href="./Presentation/CustomerShopping/testCustomerShopping.php">Compras cliente</a>     

        <?php
        if (@session_start() == true) {
            if (isset($_SESSION["idUser"])) {
                ?>
                <a href="./Presentation/Account/AccountInterface.php">CRUD cuenta cliente</a>                                           
                <a href="./Presentation/Search/Search.php">Búsqueda</a>
                <a href="./Presentation/WallView/ProductOption.php">Muro de productos</a>
                <a href="Business/loginAction.php?logout">Cerrar</a>
                <hr>
                <?php
            } else {
                ?>
                <hr>
                <div>Usuario predeterminado: usuario = admin contraseña = admin</div>
                <br>
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
    </body>
</html>
