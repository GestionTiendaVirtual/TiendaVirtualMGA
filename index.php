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
        <hr>

        <!--Form para busquedas-->
        
            <input type="text" id="termSearch" placeholder="termino de busqueda">
            <button onclick="ajax();" >buscar</button>
        <!-- Fin del form para busqueda -->

        <script type="text/javascript">
            function ajax() {
                // De esta forma se obtiene la instancia del objeto XMLHttpRequest
                if(window.XMLHttpRequest) {
                    connection = new XMLHttpRequest();
                }
                else if(window.ActiveXObject) {
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
                if(connection.readyState == 4) {
                    alert(connection.responseText);
                }
            }
        </script>

    </body>
</html>
