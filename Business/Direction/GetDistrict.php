<?php
	
	require ('../../Data/conexion.php');
	$idCanton = $_GET['idCanton'];
	
	echo 'Selecciona Localidad: <select name="cbx_localidad" id="cbx_localidad">';
	
	

	$query = "SELECT idDistrict, nameDistrict FROM tbdistrict WHERE idCanton = '$idCanton' ORDER BY idDistrict";
	
	if($resultado=$mysqli->query($query))
	{
		while($row = $resultado->fetch_assoc())
		{
		?>
		<option value="<?php echo $row['idDistrict']; ?>"><?php echo $row['nameDistrict']; ?></option>
		
		<?php
		}
	}
	echo '</select>';
?>