<?php
	
	require ('../../Data/conexion.php');
	$idProvince = $_GET['idProvince'];
	
	echo 'Seleccione el canton : <select onChange="getDistrict(this.value);" name="cbxCanton" id="cbxCanton">';
	
	$query = "select idcanton, namecanton from tbcanton where idprovince = '$idprovince' order by idcanton";
	
	if($resultado=$mysqli->query($query))
	{
		while($row = $resultado->fetch_assoc())
		{
		?>
		<option value="<?php echo $row['idcanton']; ?>"><?php echo $row['namecanton']; ?></option>
		
		<?php
		}
	}
	echo '</select>';
?>