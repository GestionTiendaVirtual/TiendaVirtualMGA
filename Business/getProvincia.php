<?php
	
	require ('../Data/conexion.php');
	
	echo 'Selecciona Provincia : <select onChange="getCanton(this.value);" name="cbx_provincia" id="cbx_provincia">';
	
	$query = "SELECT idProvincia, nombreProvincia FROM tbprovincia ORDER BY idProvincia";
	
	if($resultado=$mysqli->query($query))
	{
		while($row = $resultado->fetch_assoc())
		{
		?>
		<option value="<?php echo $row['idProvincia']; ?>"><?php echo $row['nombreProvincia']; ?></option>
		
		<?php
		}
	}
	echo '</select>';
?>