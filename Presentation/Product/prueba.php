<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="../../JS/menu.css" rel="stylesheet" type="text/css"/>
        <script src="../../JS/jquery-3.1.1.min.js" type="text/javascript"></script>

    </head>
    <body>
        <br><br><hr>

    <center>
        <table>
            <tr>
                <td><a href="../../index.php">Inicio</a></td>
                <td><a href="../Search/Search.php">Buscar</a></td>
            </tr>
        </table>
    </center>

    <hr><br><br>
    <?php
    include_once '../../Business/Product/ProductBusiness.php';
    include_once '../../Business/SpecificationProduct/SpecificationproductBusiness.php';
    $productBusiness = new ProductBusiness();
    $product = $productBusiness->getProductByID(1);
    $specificationBusiness = new SpecificationproductBusiness();
    $specification = $specificationBusiness->getSpecificationProduct(1);
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
                <tr><td><h2>Marca:</h2></td> <td><h3><?php echo $product[0]->getBrand(); ?></h3><br></td><td><a href="../WallView/Wall.php?idProduct=1">Ver muro</a></td></tr>
                <tr><td><h2>Modelo:</h2></td> <td><h3><?php echo $product[0]->getModel(); ?></h3><br></td></tr>
                <tr><td><h2>Serie:</h2></td> <td><h3><?php echo $product[0]->getSerie(); ?></h3><br></td></tr>
                <tr><td><h2>Precio:</h2></td> <td><h3><?php echo '₡' . number_format($product[0]->getPrice()); ?></h3><br></td></tr>
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
                <tr><td><h2>Descripción:</h2></td><td><h3><?php echo $product[0]->getDescription(); ?></h3><br></td></tr>
                <tr><td><h2>Características:</h2></td><td><h3><?php echo $product[0]->getCharacteristics(); ?></h3><br></td></tr>
                <tr>
                    <td><h2>Especificaciones:</h2><br></td>
                    <?php
                    foreach ($specification as $currentSpe) {
                        ?>
                    <tr>
                        <td><h3><?php echo $currentSpe->getNameSpecification(); ?></h3></td>
                        <td><h3><?php echo $currentSpe->getValueSpecification(); ?></h3></td></tr>
                    <?php
                }
                ?>



                </tr>
            </table>
        </div>
    </div>



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
