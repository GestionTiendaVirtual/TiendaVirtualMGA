<?php

	require ('../../Data/conexion.php');
	echo 'Selecciona el tipo producto : <select onChange="getProduct(this.value);" name="cbxTipoProducto" id="cbxTipoProducto">';
	
	$query = "SELECT idTypeProduct, nameTypeProduct FROM tbtypeproduct ORDER BY idTypeProduct";
	
	if($resultado=$mysqli->query($query))
	{
		while($row = $resultado->fetch_assoc())
		{
		?>
		<option value="<?php echo $row['idTypeProduct']; ?>"><?php echo $row['nameTypeProduct']; ?></option>
		
		<?php
		}
	}
	echo '</select>';
?>

