<html>
    <head>
        <title>Opcion de </title>
        <script src="../../Data/ProductWall.php"></script>
        <script type="text/javascript" src="../../JS/ProductWall.js"></script>
    </head>
    <body>

        <?php
        include_once '../../Business/TypeProduct/typeProductBusiness.php';
        $typeBusiness = new typeProductBusiness();
        $result = $typeBusiness->getTypeProduct();
        ?>
        <h1>Muro</h1>
        <a href="../../index.php">Inicio</a>
        <br>
        <h2>Seleccione el tipo:</h2>

        <select>
            <option>--Seleccione--</option>
            <?php
            foreach ($result as $currentType) {
                ?>
                <option onclick="getProducts(this.value)" value="<?php echo $currentType->getIdTypeProduct(); ?>">
                    <?php echo $currentType->getNameTypeProduct(); ?></option>
                <?php
            }
            ?>
        </select>
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            include_once '../../Business/Product/ProductBusiness.php';
            $productBusiness = new ProductBusiness();
            $result = $productBusiness->getProductsWall($id);
            ?>
            <select>
                <option>--seleccione--</option>>
                <?php
                foreach ($result as $currentProduct) {
                    ?>
                <option onclick="getWallProduct(this.value)" value="<?php echo $currentProduct->getIdProduct(); ?>">
                    <?php echo $currentProduct->getBrand() .'-'. $currentProduct->getModel(); ?></option>

                    <?php
                }
                ?>
            </select>
            <?php
        }
        ?>

        <form action="Wall.php" method="POST">
            <div id="producto"></div> <br /> 
        </form>
        


    </body>


    <script>
        function getProducts(idTypeProduct) {
            window.location = "./ProductOption.php?id=" + idTypeProduct;
        }
        function getWallProduct(idProduct) {
            window.location = "./Wall.php?idProduct=" + idProduct;
        }
    </script>

</html>
