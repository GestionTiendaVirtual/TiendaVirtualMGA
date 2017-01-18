<?php
	
	require ('../Data/conexion.php');
	
	$id_estado = $_GET['estado_id'];
	
	echo 'Seleccione el canton : <select onChange="getLocalidad(this.value);" name="cbx_municipio" id="cbx_municipio">';
	
	$query = "SELECT idCanton, nombreCanton FROM tbCanton WHERE idProvincia = '$id_estado' ORDER BY idCanton";
	
	if($resultado=$mysqli->query($query))
	{
		while($row = $resultado->fetch_assoc())
		{
		?>
		<option value="<?php echo $row['idCanton']; ?>"><?php echo $row['nombreCanton']; ?></option>
		
		<?php
		}
	}
	echo '</select>';
?>