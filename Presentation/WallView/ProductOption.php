<html>
    <head>
        <title>Opcion de </title>
       
        <script src="../../JS/jquery-3.1.1.min.js" type="text/javascript"></script>
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

        <select id="selType">
            <option>--Seleccione--</option>
            <?php
            foreach ($result as $currentType) {
                ?>
                <option value="<?php echo $currentType->getIdTypeProduct(); ?>">
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

            <select id="selProduct">
                <option>--seleccione--</option>>
                <?php
                foreach ($result as $currentProduct) {
                    ?>
                    <option value="<?php echo $currentProduct->getIdProduct(); ?>">
                        <?php echo $currentProduct->getBrand() . '-' . $currentProduct->getModel(); ?></option>

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
        
        $(document).ready(function () {

            $("#selType").change(function () {
                var idTypeProduct = $('select[id=selType]').val();
                window.location = "./ProductOption.php?id=" + idTypeProduct;
            });
            $("#selProduct").change(function () {
                var idProduct = $('select[id=selProduct]').val();
                window.location = "./Wall.php?idProduct=" + idProduct;
            });
        });
    </script>

</html>
