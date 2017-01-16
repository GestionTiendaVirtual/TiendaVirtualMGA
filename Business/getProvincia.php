<?php
	
	require ('../Data/conexion.php');
	
	echo 'Selecciona Provincia : <select onChange="getCanton(this.value);" name="cbx_provincia" id="cbx_provincia">';
	
	$query = "SELECT id_provincia, provincia FROM provincia ORDER BY id_provincia";
	
	if($resultado=$mysqli->query($query))
	{
		while($row = $resultado->fetch_assoc())
		{
		?>
		<option value="<?php echo $row['id_provincia']; ?>"><?php echo $row['provincia']; ?></option>
		
		<?php
		}
	}
	echo '</select>';
?>