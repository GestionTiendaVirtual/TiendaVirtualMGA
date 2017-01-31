<?php
require ('../../Data/conexion.php');


if (isset($_GET['idProduct'])) {
    $idTypeProduct = $_GET['idProduct'];
} else {
    $idTypeProduct = $_POST['cbxProducto'];
}
    
 
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Wall</title>
    </head>
    <body>
        <h1>Muro de productos</h1>
        <a href="../../index.php">Atras</a><br>
        <form action="../../Business/Wall/insertComment.php" method="POST">
            <textarea id="comment" name="comment"></textarea>
            <input type="hidden" id="idProduct" name="idProduct" value="<?php echo $idTypeProduct; ?>"><br>
            <input type="submit" name="boton" value="Ingresar comentario" id="Registrar">
        </form>
        <h2>Comentarios</h2>
        <?php
        include '../../Business/Wall/WallBusiness.php';
        $wallBusiness = new WallBusiness();
        $result = $wallBusiness->getAllCommentBusiness($idTypeProduct);
        ?>



    </body>
</html>
