<?php
	
	require ('../Data/conexion.php');
	
	$id_municipio = $_GET['municipio_id'];
	
	echo 'Selecciona Localidad: <select name="cbx_localidad" id="cbx_localidad">';
	
	$query = "SELECT idDistrito, nombreDistrito FROM tbdistrito WHERE idCanton = '$id_municipio' ORDER BY idDistrito";
	
	if($resultado=$mysqli->query($query))
	{
		while($row = $resultado->fetch_assoc())
		{
		?>
		<option value="<?php echo $row['idDistrito']; ?>"><?php echo $row['nombreDistrito']; ?></option>
		
		<?php
		}
	}
	echo '</select>';
?>