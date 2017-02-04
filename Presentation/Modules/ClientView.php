<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="../../CSS/menu.css" rel="stylesheet" type="text/css"/>
        <title></title>
    </head>
    <body>
        <?php
        include_once '../../Business/Product/ProductBusiness.php';
        include_once '../../Business/TypeProduct/typeProductBusiness.php';
        $productBusiness = new ProductBusiness();
        $typeProduct = new typeProductBusiness();
        $result = $typeProduct->getTypeProduct();
        ?>
        <table>
            <tr>
                <td><h1>MGA Store&emsp;&emsp;&emsp;&emsp;</h1>
                </td>
                <td><form method="POST" action="./Search.php">

                        <label for="skills">Buscar: </label>
                        <input id="skills" name="termSearch" size="50">
                        <button >Buscar</button>
                        <td>&emsp;&emsp;&emsp;</td>
                    </form>
                </td>
                <td>
                    <div id="header">
                        <ul class="nav">
                            <li><a href="">Categorías</a>
                                <ul>
                                    <?php
                                    foreach ($result as $cuurentType) {
                                        ?>
                                    <li><a href="ClientView.php?idTypeProduct=<?php echo $cuurentType->getIdTypeProduct(); ?>">
                                        <?php echo $cuurentType->getNameTypeProduct();?></a>
<!--                                        <ul>
                                            <li><a href="">Submenu1</a></li>
                                            <li><a href="">Submenu2</a></li>
                                            <li><a href="">Submenu3</a></li>
                                            <li><a href="">Submenu4</a></li>
                                        </ul>-->
                                    </li>
                                    <?php 
                                    }
                                    ?>
                                </ul>
                            </li>
                            <li><a href="../../Presentation/Account/AccountInterface.php">Cuenta</a>
                            <li><a href="#">Carrito compras</a>
                            <li><a href="../../Business/loginAction.php?logout">Cerrar</a>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
        </table>
    <center>
        <hr>
        <h1>Productos</h1>
        <br>        
        <table>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Modelo</th>           
            <th>Precio</th>
            <th>Ver</th>
            <?php
            if (isset($_GET['idTypeProduct'])) {
                $products = $productBusiness->getProductsTypeProduct($_GET['idTypeProduct']);
            } else {
                $products = $productBusiness->getProducts();
            }
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
                    <td><label><a href="../Product/ProductDetail.php?idProduct=<?php echo $currentProducts->getIdProduct(); ?>">Ver</a></label></td>
                </tr>
                <tr>
                    <?php
                    $cont = 0;
                    foreach ($currentProducts->getPathImages() as $path) {
                        if ($cont < 3) {
                            ?>
                            <td><img style="width: 100px; height: 100px;"src="<?php echo $path; ?>">&emsp;&emsp;</td>
                                <?php
                            }
                            $cont++;
                        }
                        ?>

                </tr>
                <?php
            }
            ?>
        </table>
    </center>
</body>
</html>
