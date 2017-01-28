<?php
	
	require ('../../Data/conexion.php');
	$idProvince = $_GET['idProvince'];
	
	echo 'Seleccione el canton : <select onChange="getDistrict(this.value);" name="cbxCanton" id="cbxCanton">';
	
	$query = "SELECT idCanton, nameCanton FROM tbCanton WHERE idProvince = '$idProvince' ORDER BY idCanton";
	
	if($resultado=$mysqli->query($query))
	{
		while($row = $resultado->fetch_assoc())
		{
		?>
		<option value="<?php echo $row['idCanton']; ?>"><?php echo $row['nameCanton']; ?></option>
		
		<?php
		}
	}
	echo '</select>';
?>