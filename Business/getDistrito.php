<?php
	
	require ('../Data/conexion.php');
	
	$id_municipio = $_GET['municipio_id'];
	
	echo 'Selecciona el distrito: <select name="cbx_localidad" id="cbx_localidad">';
	
	$query = "SELECT id_distrito, nombre_distrito FROM distrito WHERE id_canton = '$id_municipio' ORDER BY id_distrito";
	
	if($resultado=$mysqli->query($query))
	{
		while($row = $resultado->fetch_assoc())
		{
		?>
		<option value="<?php echo $row['id_distrito']; ?>"><?php echo $row['nombre_distrito']; ?></option>
		
		<?php
		}
	}
	echo '</select>';
?>