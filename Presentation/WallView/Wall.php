<?php
	require ('../../Data/conexion.php');
	$idTypeProduct = $_POST['cbxProducto'];
	

?>

<!DOCTYPE html>
<html>
<head>
	<title>Wall</title>
</head>
<body>
	<H1>Muro de productos</H1>
	<form action="../../Business/Wall/insertComment.php" method="POST">
		<textarea id="comment" name="comment"></textarea>
		<input type="hidden" id="idProduct" name="idProduct" value="<?php echo $idTypeProduct;?>">
		<input type="submit" name="boton" value="Ingresar comentario" id="Registrar">
	</form>

	<?php

        include '../../Business/Wall/WallBusiness.php';
        $wallBusiness = new WallBusiness();
        $result = $wallBusiness->getAllCommentBusiness();
	?>
	<a href="ProductOption.php">Atras</a>


</body>
</html>