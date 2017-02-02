<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Busquedas</title>
        

        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>


        <script>
            $(function() {
                function split( val ) {
                    return val.split( /,\s*/ );
                }
                function extractLast( term ) {
                    return split( term ).pop();
                }
                
                $( "#skills" ).bind( "keydown", function( event ) {
                    if ( event.keyCode === $.ui.keyCode.TAB &&
                        $( this ).autocomplete( "instance" ).menu.active ) {
                        event.preventDefault();
                    }
                })
                .autocomplete({
                    minLength: 1,
                    source: function( request, response ) {
                        // delegate back to autocomplete, but extract the last term
                        $.getJSON("../../Business/Search/GetAllBusinessForAJAX.php", { term : extractLast( request.term )},response);
                    },
                    focus: function() {
                        // prevent value inserted on focus
                        return false;
                    },
                    select: function( event, ui ) {
                        var terms = split( this.value );
                        // remove the current input
                        terms.pop();
                        // add the selected item
                        terms.push( ui.item.value );
                        // add placeholder to get the comma-and-space at the end
                        terms.push( "" );
                        this.value = terms.join( ", " );
                        return false;
                    }
                });
            });
        </script>
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

            <label for="skills">Tag your skills: </label>
            <input id="skills" name="termSearch" size="50">


            <!-- <input type="text" id="termSearch" name="query"> -->
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

      

    </body>
</html>
