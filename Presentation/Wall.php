<?php
	require ('../Data/conexion.php');
	//$idTypeProduct = $_POST['cbxProducto'];
	//echo $idTypeProduct;
	//$query = "SELECT * FROM tbcomment WHERE idProduct='$idTypeProduct'";
	$ultimo= "SELECT MAX(idComment) from tbcomment";

	

?>


<!DOCTYPE html>
<html>
<head>
	<title>Wall</title>
</head>
<body>
	<H1>Muro de productos</H1>
	<form action="" method="POST">
		<textarea name="comment"></textarea>
		<input type="hidden" name="idProduct" value="<?php echo $idTypeProduct; ?>">
		
	</form>

	<?php
		if($resultado=$mysqli->query($ultimo))
		{
			$row = $resultado->fetch_assoc();
			echo $row['MAX(idComment)']+1;
			echo '<br></br>';
		}

	?>


</body>
</html>