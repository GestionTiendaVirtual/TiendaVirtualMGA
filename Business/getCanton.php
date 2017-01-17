<?php
	
	require ('../Data/conexion.php');
	
	$id_estado = $_GET['estado_id'];
	
	echo 'Seleccione el canton : <select onChange="getLocalidad(this.value);" name="cbx_municipio" id="cbx_municipio">';
	
	$query = "SELECT id_canton, nombre_canton FROM canton WHERE id_provincia = '$id_estado' ORDER BY id_canton";
	
	if($resultado=$mysqli->query($query))
	{
		while($row = $resultado->fetch_assoc())
		{
		?>
		<option value="<?php echo $row['id_canton']; ?>"><?php echo $row['nombre_canton']; ?></option>
		
		<?php
		}
	}
	echo '</select>';
?>