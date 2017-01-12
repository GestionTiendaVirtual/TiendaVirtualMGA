<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include '../Business/ProductBusiness.php';
        $productBusiness = new ProductBusiness();
        $products = $productBusiness->getProducts();
        ?>
    <center>
        <br>
        <hr>
        <h1>Visualizar Productos</h1>
        <br>        
        <table>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Precio</th>
            <th>Color</th>           
            <?php
            foreach ($products as $currentProducts) {
                ?>                
                <tr>
                    <td><label><?php echo $currentProducts->getBrand(); ?>&emsp;&emsp;&emsp;</label></td>
                    <td><label><?php echo $currentProducts->getModel(); ?>&emsp;&emsp;&emsp;</label></td>
                    <td><label><?php echo $currentProducts->getPrice(); ?>&emsp;&emsp;&emsp;</label></td>
                    <td><label><?php echo $currentProducts->getColor(); ?>&emsp;&emsp;&emsp;</label></td>           
                </tr>
                <?php
            }
            ?>
        </table>
    </center>
</body>
</html>
