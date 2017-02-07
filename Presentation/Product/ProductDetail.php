<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="../../JS/jquery-3.1.1.min.js" type="text/javascript"></script>
    </head>
    <body>
    <br><br><hr>
    <?php
    if (@session_start() == true) {
        if (isset($_SESSION["idUser"])) {
            include_once '../../Business/Product/ProductBusiness.php';
            include_once '../../Business/SpecificationProduct/SpecificationproductBusiness.php';
            include_once '../../Data/Frecuency.php';
            $idProduct = $_GET["idProduct"];
            $frecuency = new Frecuency();
            $result = $frecuency->updateView();
            $productBusiness = new ProductBusiness();
            $product = $productBusiness->getProductByID($idProduct);
            $specificationBusiness = new SpecificationproductBusiness();
            $specification = $specificationBusiness->getSpecificationProduct($idProduct);
            ?>
            <div>
                <center><h1><?php echo $product[0]->getName(); ?></h1></center>
                <table>
                    <?php
                    $cont = 0;
                    foreach ($product[0]->getPathImages() as $currentImage) {
                        $img = $currentImage;
                        if ($cont < 3) {
                            ?>
                            <tr><td><img  src="<?php echo $currentImage; ?>" alt="" style="width: 100px; height: 100px;"/></td></tr>

                            <?php
                        } else {
                            ?>
                            <tr>
                                <td><img  src="<?php echo $currentImage; ?>" alt="" style="width: 135px; height: 100px;"/></td>

                            </tr>
                            <?php
                        }
                        $cont++;
                    }
                    ?>
                </table>
                <div style="position: relative; bottom: 420px; margin-left: 110px;">
                    <img style="width: 300px; height: 300px;"id="imgChange" src="<?php echo $img; ?>" alt=""/></div>

                <div style="position: relative; bottom: 730px; margin-left: 430px;">

                    <table>
                        <tr><td><h2>Marca:</h2></td> <td><h4><?php echo $product[0]->getBrand(); ?></h4></td></tr>
                        <tr><td><h2>Modelo:</h2></td> <td><h4><?php echo $product[0]->getModel(); ?></h4></td></tr>
                        <tr><td><h2>Serie:</h2></td> <td><h4><?php echo $product[0]->getSerie(); ?></h4></td></tr>
                        <tr><td><h2>Precio:</h2></td> <td><h4><?php echo '₡' . number_format($product[0]->getPrice()); ?></h3><br></td></tr>
                                    <tr>
                                        <td><h2>Colores:</h2></td>
                                        <td>
                                            <?php
                                            $colors = split(";", $product[0]->getColor());
                                            for ($i = 0; $i < sizeof($colors); $i++) {
                                                if ($colors[$i] != "") {
                                                    ?>
                                                    <input type="text" disabled="true" style="background:
                                                           <?php echo $colors[$i]; ?>;
                                                           border: none;  width: 30px; height: 30px;"/>                            
                                                           <?php
                                                       }
                                                   }
                                                   ?>
                                        </td>
                                    </tr>
                                    <tr><td><h2>Descripción:</h2></td><td><h4><?php echo $product[0]->getDescription(); ?></h4></td></tr>
                                    <tr><td><h2>Características:</h2></td><td><h4><?php echo $product[0]->getCharacteristics(); ?></h4></td></tr>
                                    <tr><td>
                                        
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
                    <input type="submit" name ="change" id="change" value="Agregar al Carrito" >
                </form>
                <?php
                $idProduct=$_GET['idProduct'] ;
                ?>
                    
    
                                        </td></tr>
                    </table>
                </div >
                <div style="position: relative; bottom: 1255px; margin-left: 800px;">
                    <table>
                        <tr>
                            <td><h2>Especificaciones:</h2><td></td></td><td><a href="../WallView/Wall.php?idProduct=<?php echo $idProduct;?>">Ver muro</a></td><br>
                        
                        <?php
                        foreach ($specification as $currentSpe) {
                            ?>
                            <tr>
                                <td><h4><?php echo $currentSpe->getNameSpecification(); ?></h4></td>
                                <td><h4><?php echo $currentSpe->getValueSpecification(); ?></h4></td></tr>
                            <?php
                        }
                        ?>
                        </tr>

                    </table>
                </div>
            </div>
            <?php
        }
    }
    ?>
</body>

<script>
    $(document).ready(function () {

        $(document).ready(function () {
            $("img").click(function () {
                var elem = $(this);
                var src = elem.attr('src');
                $("#imgChange").prop('src', src);
            });
        });
    });


</script>

</html>
