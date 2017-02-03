<?php
if (@session_start() == true) {
    if (isset($_SESSION["idUser"])) {
        ?>

        <!DOCTYPE html>

        <html>
            <head>
                <meta charset="UTF-8">
                <title></title>
            </head>
            <body>
                <?php
                require_once '../../Data/Frecuency.php';
                $frecuency = new Frecuency();
                $result = $frecuency->updateView();
                ?>

                <?php
                include_once '../../Business/Product/ProductBusiness.php';
                $productBusiness = new ProductBusiness();
                $products = $productBusiness->getProductByID($_GET['idProduct']);
                ?>
            <center>
                <br>
                <table>
                    <tr>
                        <td><a href="../../index.php">Inicio</a></td>
                    </tr>
                </table>
                <hr>
                <h1>Visualizar Producto</h1>
                <br>        
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
                            <td><label><?php
                                    $price = number_format($currentProducts->getPrice());
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
                include_once '../../Business/Details/detailsBusiness.php';
                $detailsBusiness = new detailsBusiness();
                $wish = $detailsBusiness->isDesired($_GET["idProduct"], $_SESSION["idUser"]);
                
                ?>
                <form id="wish" method="POST" action="../../Business/Details/desireAction.php">

                    <input type="hidden" id="idProductWish" name="idProductWish" value="<?php echo $_GET['idProduct'] ?>">                    
                    <input type="hidden" id="idclientWish" name="idClientWish" value="<?php echo $_SESSION["idUser"] ?>">                    
                    <input type="checkbox" name="checkWish" <?php
                    
                    if ($wish) {
                        echo 'checked="false"';
                    }
                    ?> disabled/>  <br>
                    <input type="submit" name ="change" id="change" value="Desear" >
                </form>
                <?php
                $idProduct=$_GET['idProduct'] ;
                ?>
                    
    
                <a href="../WallView/Wall.php?idProduct='$idProduct'">Ver muro</a><br>

                
            </center>
        </body>
        </html>
        <?php
        
    }
}
?>
