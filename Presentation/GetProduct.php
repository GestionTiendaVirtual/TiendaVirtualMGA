<?php
	
	require ('../Data/conexion.php');
	
	$idTypeProduct = $_GET['idTypeProduct'];
	
	echo 'Seleccione el producto: <select name="cbxProducto" id="cbxProducto">';
	
	$query = "SELECT * FROM tbproduct WHERE idTypeProduct = '$idTypeProduct'";
	
	if($resultado=$mysqli->query($query))
	{
		while($row = $resultado->fetch_assoc())
		{
		?>
		<option value="<?php echo $row['idProduct']; ?>"><?php echo $row['brand']; ?></option>
		
		<?php
		}
	}
	echo '</select>';
?>