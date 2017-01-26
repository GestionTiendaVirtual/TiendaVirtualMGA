<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
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
            <input type="text" id="termSearch" name="termSearch" placeholder="termino de busqueda">
            <button >buscar</button>
        </form>
        <!-- Fin del form para busqueda -->


        <?php
            if(isset($_POST["termSearch"])){
                include "../../Business/Search/SearchProductBusiness.php";
                $instSearchBusiness = new SearchProductBusiness();
                $products = $instSearchBusiness->searchProduc($_POST["termSearch"]);
        ?>

            <table>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Precio</th>
            <th>Color</th>           
            <th>Descripción</th>           
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
                    <td><label><?php echo $currentProducts->getColor(); ?>&emsp;&emsp;&emsp;</label></td>           
                    <td><label><?php echo $currentProducts->getDescription(); ?>&emsp;&emsp;&emsp;</label></td>           
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
            }
        ?>

    </body>
</html>
