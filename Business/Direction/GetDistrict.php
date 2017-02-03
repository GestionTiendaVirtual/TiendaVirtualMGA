<?php
	
	require ('../../Data/conexion.php');
	$idCanton = $_GET['idCanton'];
	
	echo 'Selecciona Localidad: <select name="cbx_localidad" id="cbx_localidad">';
	
	

	$query = "select iddistrict, namedistrict from tbdistrict where idcanton = '$idcanton' order by iddistrict";
	
	if($resultado=$mysqli->query($query))
	{
		while($row = $resultado->fetch_assoc())
		{
		?>
		<option value="<?php echo $row['iddistrict']; ?>"><?php echo $row['namedistrict']; ?></option>
		
		<?php
		}
	}
	echo '</select>';
?>