<?php
	require ('../../Data/conexion.php');
	
	echo 'Selecciona Provincia : <select onChange="getCanton(this.value);" name="cbx_provincia" id="cbx_provincia">';
	
	$query = "select idProvince, nameProvince from tbprovince order by idprovince";
	
	if($resultado=$mysqli->query($query))
	{
		while($row = $resultado->fetch_assoc())
		{
		?>
		<option value="<?php echo $row['idProvince']; ?>"><?php echo $row['nameProvince']; ?></option>
		
		<?php
		}
	}
	echo '</select>';
?>