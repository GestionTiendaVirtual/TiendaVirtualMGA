<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Busquedas</title>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    </head>
    <body lang="en">
        <?php
        session_start();
        if(!isset($_SESSION["idUser"])){
            header("location: ../../index.php");
        }
        ?>

    	<h1>Search</h1>
        <br>
        <hr>
    	<a href="../../index.php"><h3>Inicio</h3></a>
        <hr>

        <!--Form para busquedas-->
        <form method="POST" action="./Search.php">
            <input type="text" id="termSearch" name="termSearch">
            <button >buscar</button>
        </form>
        <!-- Fin del form para busqueda -->


        <?php
            if(isset($_POST["termSearch"])){
                require_once '../../Data/Frecuency.php';
                $frecuency = new Frecuency();
                $result = $frecuency->updateSearch();

                include_once "../../Business/Search/SearchProductBusiness.php";
                $instSearchBusiness = new SearchProductBusiness();
                $products = $instSearchBusiness->searchProduc($_POST["termSearch"]);
                if (count($products) > 0) {
        ?>

                    <table>
                    <th>Nombre</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Precio</th>        
                    <?php
                    foreach ($products as $currentProducts) {
                        ?>                
                        <tr>
                            <td><label><?php echo $currentProducts->getName(); ?>&emsp;&emsp;&emsp;</label></td>
                            <td><label><?php echo $currentProducts->getBrand(); ?>&emsp;&emsp;&emsp;</label></td>
                            <td><label><?php echo $currentProducts->getModel(); ?>&emsp;&emsp;&emsp;</label></td>
                            <td><label><?php $price = number_format($currentProducts->getPrice());
                        echo '₡ ' . $price
                        ?>&emsp;&emsp;&emsp;</label></td>
                            <td><a href="../Product/ProductDetails.php?idProduct=<?php echo $currentProducts->getIdProduct() ?>">Ver producto</a><td>           
                        </tr>
                        <tr>
                            <?php
                            foreach ($currentProducts->getPathImages() as $path) {
                                ?>
                                <td><img style="width: 100px; height: 100px;"src="<?php echo $path; ?>">&emsp;&emsp;</td>
                                    <?php
                                }
                                ?>

                        </tr>
                <?php
                    }
            ?>
        </table>
        <?php
                }else{
        ?>
                    <h3>No se han encontrado coincidencias con: <?php echo $_POST["termSearch"]?> </h3>
        <?php
                }
            }
        ?>

        <!-- Script para autocompletado -->
        <script type="text/javascript">
           $(document).ready(inicio);
           function inicio(){
              
            /*AJAX*/
                // De esta forma se obtiene la instancia del objeto XMLHttpRequest
                if(window.XMLHttpRequest) {
                    connection = new XMLHttpRequest();
                }
                else if(window.ActiveXObject) {
                    connection = new ActiveXObject("Microsoft.XMLHTTP");
                }
                // Preparando la función de respuesta
                connection.onreadystatechange = response;
                 
                // Realizando la petición HTTP con método POST
                connection.open('POST', '../../Business/Search/GetAllBusinessForAJAX.php');
                connection.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                connection.send();

              /*Se obtienen las opciones por medio de ajax*/
              
           }

            function response() {
                if(connection.readyState == 4) {
                    var text = String(connection.responseText);

                    var posibilidades = text.split(" ");
                    $("#termSearch").autocomplete({source:posibilidades});
                }
            }
        </script>

    </body>
</html>
