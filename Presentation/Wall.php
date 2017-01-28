<?php
	require ('../Data/conexion.php');
	$idTypeProduct = $_POST['cbxProducto'];
	//echo $idTypeProduct;
	//$query = "SELECT * FROM tbcomment WHERE idProduct='$idTypeProduct'";
	

?>

<!DOCTYPE html>
<html>
<head>
	<title>Wall</title>
</head>
<body>
	<H1>Muro de productos</H1>
	<form action="../Business/Wall/insertComment.php" method="POST">
		<textarea id="comment" name="comment"></textarea>
		<input type="hidden" id="idProduct" name="idProduct" value="<?php echo $idTypeProduct; ?>">
		<input type="submit" name="boton" value="boton" id="Registrar">
	</form>

	<?php

        include '../Business/Wall/WallBusiness.php';
        $wallBusiness = new WallBusiness();
        $result = $wallBusiness->insertComment();

       
		

	?>


</body>
</html>