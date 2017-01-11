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
            $result = $productBusiness->saludar();
            echo $result;
        ?>
    </body>
</html>
